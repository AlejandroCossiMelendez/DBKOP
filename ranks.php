<?php 
/*
    Copyright (C) 2007 - 2008  Nicaw

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
*/
include ("include.inc.php");
$ptitle="Highscores - $cfg[server_name]";
include ("header.inc.php");

$SQL = new SQL();
?>
<style>
select {
    background-color: #222;
    color: #ffffff;
    border: 2px solid #444;
    padding: 8px 15px;
    font-size: 16px;
    border-radius: 5px;
    margin-bottom: 20px;
    width: 200px;
    cursor: pointer;
}

select:hover {
    border-color: #888;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
}

.pagination button {
    background: linear-gradient(to bottom, #444, #111);
    color: #fff;
    border: none;
    padding: 8px 15px;
    margin: 0 10px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.3s;
}

.pagination button:hover {
    background: linear-gradient(to bottom, #666, #222);
    transform: scale(1.05);
}

.pagination b {
    color: #ffffff;
    font-size: 18px;
    margin: 0 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
}

th {
    background-color: rgba(50, 50, 50, 0.7);
    color: #ffffff;
    padding: 12px;
    text-align: left;
}

tr {
    background-color: rgba(0, 0, 0, 0.5);
}

tr:nth-child(even) {
    background-color: rgba(70, 70, 70, 0.5);
}

td {
    padding: 10px;
    border-bottom: 1px solid #333;
}

a {
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s;
}

a:hover {
    color: #cccccc;
    text-decoration: underline;
}

.stats-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.stats-box {
    background-color: rgba(0, 0, 0, 0.6);
    border: 2px solid #444;
    border-radius: 8px;
    padding: 15px;
    width: 48%;
}

.stats-box h2 {
    color: #ffffff;
    border-bottom: 2px solid #888;
    padding-bottom: 5px;
    margin-top: 0;
}

.bar-container {
    height: 20px;
    background-color: #222;
    border-radius: 10px;
    margin: 5px 0;
    overflow: hidden;
}

.bar {
    height: 100%;
    background: linear-gradient(to right, #555, #888);
    border-radius: 10px;
    text-align: right;
    padding-right: 5px;
    font-size: 12px;
    line-height: 20px;
    color: white;
}

@font-face {
    font-family: 'DBZ Font';
    src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
}

</style>

<div id="content">
<div class="top">Highscores</div>
<div class="mid">
<select name="sort" onchange="self.location.href=this.value">
<?php 
if (empty($_GET['sort'])) $_GET['sort'] = 'census';

$options = array_merge(array('census', 'level', 'maglevel'), $cfg['skill_names']);

foreach ($options as $skill){
    if ($skill == $_GET['sort'])
        $selected = ' selected="selected"';
    else
        $selected = '';
    echo '<option value="ranks.php?sort='.$skill.'"'.$selected.'>'.ucfirst($skill).'</option>';
}
echo '</select>';

if (!isset($_GET['page']) || $_GET['page'] < 0) $p = 0;
else $p = (int) $_GET['page'];

if ($_GET['sort'] == 'level' || $_GET['sort'] == 'maglevel'){
    $query = 'SELECT groups.access, groups.id, players.name, players.level, players.maglevel, players.experience FROM players LEFT OUTER JOIN groups ON players.group_id = groups.id ORDER BY `'.addslashes($_GET['sort'])
.'` DESC LIMIT '.$cfg['ranks_per_page']*$p.', '.$cfg['ranks_per_page'].';';
    $key = $_GET['sort'];
}elseif (in_array($_GET['sort'],$cfg['skill_names'])){
    $query = 'SELECT groups.access, a1.* FROM (SELECT players.group_id, players.name, player_skills.value FROM players, player_skills WHERE players.id = player_skills.player_id AND player_skills.skillid = '.array_search($_GET['sort'], $cfg['skill_names']) .') AS a1 LEFT OUTER JOIN groups ON a1.group_id = groups.id ORDER BY `value` DESC LIMIT '.$cfg['ranks_per_page']*$p.', '.$cfg['ranks_per_page'].';';
    $key = 'value';
}elseif ($_GET['sort'] == 'census'){
    $SQL->myQuery('SELECT players.sex, COUNT(players.id) as number FROM `players` GROUP BY players.sex');
    $total = 0;
    while ($a = $SQL->fetch_array()){
        $genders[$a['sex']] = $a['number'];
        $total += $a['number'];
    }
    $gender_names = array(0 => 'Femenino',1 => 'Masculino');
    
    $SQL->myQuery('SELECT players.vocation, COUNT(players.id) as number FROM `players` GROUP BY players.vocation');
    $total_vocations = 0;
    while ($a = $SQL->fetch_array()){
        $vocations[$a['vocation']] = $a['number'];
        $total_vocations += $a['number'];
    }
    
    echo '<div class="stats-container">';
    echo '<div class="stats-box">';
    echo '<h2><i class="fas fa-venus-mars"></i> Géneros</h2>';
    foreach (array_keys($genders) as $gender) {
        $percent = round(($genders[$gender]/$total)*100);
        echo '<div>'.$gender_names[$gender].' <span style="float:right">('.$genders[$gender].')</span></div>';
        echo '<div class="bar-container"><div class="bar" style="width: '.$percent.'%">'.$percent.'%</div></div>';
    }
    echo '</div>';
    
    echo '<div class="stats-box">';
    echo '<h2><i class="fas fa-hat-wizard"></i> Vocaciones</h2>';
    foreach (array_keys($vocations) as $vocation) {
        $percent = round(($vocations[$vocation]/$total_vocations)*100);
        echo '<div>'.$cfg['vocations'][$vocation]['name'].' <span style="float:right">('.$vocations[$vocation].')</span></div>';
        echo '<div class="bar-container"><div class="bar" style="width: '.$percent.'%">'.$percent.'%</div></div>';
    }
    echo '</div>';
    echo '</div>';    

}else{$error = "Invalid sort argument";}

if (isset($query)){
?>
<div class="pagination">
    <button onclick="self.window.location.href='ranks.php?sort=<?php echo urlencode($_GET['sort'])?>&amp;page=<?php echo $p-1?>'">&lt;&lt; Back</button>
    <b>Página <?php echo $p+1?></b>
    <button onclick="self.window.location.href='ranks.php?sort=<?php echo urlencode($_GET['sort'])?>&amp;page=<?php echo $p+1?>'">Next &gt;&gt;</button>
</div>

<table>
<tr>
    <th style="width:30px">#</th>
    <th style="width:150px">Nick</th>
    <th style="width:60px"><?php echo htmlspecialchars(ucfirst($_GET['sort']))?></th>
</tr>
<?php 
    $SQL->myQuery($query);
    if ($SQL->failed())
        throw new Exception('SQL query failed:<br/>'.$SQL->getError());
    else{
        $i = $cfg['ranks_per_page']*$p;
        while($a = $SQL->fetch_array())
        if ($a['access'] < $cfg['ranks_access'])
            {
                $i++;
                echo '<tr><td>'.$i.'</td><td><a href="characters.php?player_name='.urlencode($a['name']).'">'.htmlspecialchars($a['name']).'</a></td><td>'.$a[$key].'</td></tr>'."\n";
            }
    }
}
?>
</table>
</div>
<div class="bot"></div>
</div>
<?php include('footer.inc.php');?>