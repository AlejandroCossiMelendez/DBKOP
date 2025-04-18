<?php
class PointsPackage extends SQL
{
    private $attrs;

    public function __construct()
    {
        parent::__construct();
    }

    // Cargar un paquete de puntos por su ID
    public function load($id)
    {
        if (!is_numeric($id)) {
            throw new Exception('Invalid ID');
        }
        $package = $this->myRetrieve('points_packages', array('id_package' => $id));
        
        if ($package === false) {
            throw new Exception('Package not found.');
        }
        
        $this->attrs['id_package'] = (int) $package['id_package'];
        $this->attrs['quality_points'] = (int) $package['quality_points'];
        $this->attrs['price_package'] = (float) $package['price_package'];
        
        return true;
    }

    // Obtener el valor de un atributo
    public function getAttr($attr)
    {
        return isset($this->attrs[$attr]) ? $this->attrs[$attr] : null;
    }

    // Establecer el valor de un atributo
    public function setAttr($attr, $value)
    {
        $this->attrs[$attr] = $value;
    }

    // Guardar o actualizar un paquete de puntos
    public function save()
    {
        $package = array(
            'id_package' => $this->attrs['id_package'],
            'quality_points' => $this->attrs['quality_points'],
            'price_package' => $this->attrs['price_package'],
        );

        if ($this->exists()) {
            if (!$this->myUpdate('points_packages', $package, array('id_package' => $this->attrs['id_package']))) {
                throw new Exception('Cannot save package: ' . $this->getError());
            }
        } else {
            if (!$this->myInsert('points_packages', $package)) {
                throw new Exception('Cannot save package: ' . $this->getError());
            }
        }
        return true;
    }

    // Verificar si el paquete de puntos ya existe
    public function exists()
    {
        $this->myQuery('SELECT * FROM `points_packages` WHERE `id_package` = ' . $this->quote($this->attrs['id_package']));
        
        if ($this->failed()) {
            throw new Exception('PointsPackage::exists() cannot determine whether package exists');
        }
        return $this->num_rows() > 0;
    }

    // Eliminar un paquete de puntos
    public function delete()
    {
        if (!$this->myDelete('points_packages', array('id_package' => $this->attrs['id_package']))) {
            throw new Exception('Cannot delete package: ' . $this->getError());
        }
        return true;
    }

    // Obtener todos los paquetes de puntos
    public function getAllPackages()
    {
        $this->myQuery('SELECT * FROM `points_packages`');
        if ($this->failed()) {
            throw new Exception($this->getError());
        }

        $packages = [];
        while ($package = $this->fetch_array()) {
            $packages[] = array(
                'id_package' => $package['id_package'],
                'quality_points' => $package['quality_points'],
                'price_package' => $package['price_package']
            );
        }

        return $packages;
    }
}

?>