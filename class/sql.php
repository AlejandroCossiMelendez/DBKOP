<?php
class SQL {
    private $last_query, $last_error, $connection;

    public function __construct() {
        $this->_init();
    }

    protected function _init() {
        global $cfg;
        $this->connection = new mysqli($cfg['SQL_Server'], $cfg['SQL_User'], $cfg['SQL_Password'], $cfg['SQL_Database']);

        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function setup() {
        $tables = explode(';', @file_get_contents('database.sql'));
        foreach ($tables as $table) {
            if (trim($table) != '') {
                $this->connection->query($table);
            }
        }
    }

    public function myQuery($q) {
        $this->last_query = $this->connection->query($q);
        if ($this->last_query === false) {
            $this->last_error = "Error #{$this->connection->errno}\n$q\n" . $this->connection->error . "\n";
            $analysis = $this->analyze();
            if ($analysis !== false)
                throw new Exception($analysis . "\n" . $this->last_error);
        }
        return $this->last_query;
    }

    public function failed() {
        return ($this->last_query === false);
    }

    public function fetch_array() {
        if (!$this->failed())
            return $this->last_query->fetch_array(MYSQLI_ASSOC);
        else
            throw new Exception('Attempt to fetch failed query' . "\n" . $this->last_error);
    }

    public function insert_id() {
        return $this->connection->insert_id;
    }

    public function num_rows() {
        if (!$this->failed())
            return $this->last_query->num_rows;
        else
            throw new Exception('Attempt to count failed query' . "\n" . $this->last_error);
    }

    public function escape_string($string) {
        return $this->connection->real_escape_string($string);
    }

    public function quote($value) {
        return is_numeric($value) ? (int)$value : "'" . $this->escape_string($value) . "'";
    }

    public function getError() {
        return $this->last_error;
    }

    public function analyze() {
        $result = @$this->connection->query('SHOW TABLES');
        if ($result === false) return false;

        $t = [];
        while ($a = $result->fetch_array()) {
            $t[] = $a[0];
        }

        $is_aac_db = in_array('nicaw_accounts', $t);
        $is_server_db = in_array('accounts', $t) && in_array('players', $t);
        $is_svn = in_array('player_depotitems', $t) && in_array('groups', $t);
        $is_cvs = in_array('playerstorage', $t) && in_array('skills', $t);

        if (!$is_aac_db) {
            $this->setup();
            return 'Notice: AutoSetup has attempted to create missing tables for you.';
        } elseif (!$is_server_db) {
            return 'It appears you don\'t have SQL sample imported for OT server or it is not supported';
        } elseif ($is_cvs && !$is_svn) {
            return 'This AAC version does not support your server. Consider using SQL v1.5';
        }
        return false;
    }
    public function getConnection() {
        return $this->connection;
    }
    
    public function repairTables() {
        $tables = [];
        $result = $this->connection->query('SHOW TABLES');
        while ($a = $result->fetch_array()) {
            $tables[] = $a[0];
        }
        foreach ($tables as $table) {
            $this->connection->query('REPAIR TABLE `' . $table . '`');
        }
    }

    public function myInsert($table, $data) {
        $fields = implode("`, `", array_map([$this, 'escape_string'], array_keys($data)));
        $values = implode(", ", array_map([$this, 'quote'], array_values($data)));
        $query = "INSERT INTO `{$this->escape_string($table)}` (`$fields`) VALUES ($values);";
        return $this->myQuery($query) !== false;
    }

    public function myReplace($table, $data) {
        $fields = implode("`, `", array_map([$this, 'escape_string'], array_keys($data)));
        $values = implode(", ", array_map([$this, 'quote'], array_values($data)));
        $query = "REPLACE INTO `{$this->escape_string($table)}` (`$fields`) VALUES ($values);";
        return $this->myQuery($query) !== false;
    }

    public function myRetrieve($table, $data) {
        $conditions = [];
        foreach ($data as $key => $value) {
            $conditions[] = "`{$this->escape_string($key)}` = " . $this->quote($value);
        }
        $query = "SELECT * FROM `{$this->escape_string($table)}` WHERE " . implode(" AND ", $conditions) . " LIMIT 1;";
        $this->myQuery($query);
        if ($this->failed() || $this->num_rows() <= 0) return false;
        if ($this->num_rows() > 1) throw new Exception('Unexpected SQL answer. More than one item exists.');
        return $this->fetch_array();
    }

    public function myUpdate($table, $data, $where, $limit = 1) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "`{$this->escape_string($key)}` = " . $this->quote($value);
        }
        $conditions = [];
        foreach ($where as $key => $value) {
            $conditions[] = "`{$this->escape_string($key)}` = " . $this->quote($value);
        }
        $query = "UPDATE `{$this->escape_string($table)}` SET " . implode(", ", $set) . " WHERE " . implode(" AND ", $conditions);
        if ($limit > 0) $query .= " LIMIT $limit;";
        else $query .= ";";
        $this->myQuery($query);
        return !$this->failed();
    }

    public function myDelete($table, $data, $limit = 1) {
        $conditions = [];
        foreach ($data as $key => $value) {
            $conditions[] = "`{$this->escape_string($key)}` = " . $this->quote($value);
        }
        $query = "DELETE FROM `{$this->escape_string($table)}` WHERE " . implode(" AND ", $conditions);
        if ($limit > 0) $query .= " LIMIT $limit;";
        else $query .= ";";
        $this->myQuery($query);
        return !$this->failed();
    }
}
?>
