<?php 
/*
    Copyright (C) 2007 - 2008  Nicaw

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
*/
include ("include.inc.php");
$ptitle="Datos del Guerrero - $cfg[server_name]";
include("header.inc.php");
?>
<style>
form {
    text-align: center;
    margin: 20px 0;
}

input[type="text"] {
    background-color: #222;
    color: #FFFFFF;
    border: 2px solid rgb(255, 255, 255);
    padding: 10px;
    font-size: 16px;
    width: 250px;
    border-radius: 5px;
    margin-right: 10px;
}

input[type="submit"] {
    background: linear-gradient(to bottom,rgb(49, 49, 49),rgb(0, 0, 0));
    color: #FFFFFF;
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    text-transform: uppercase;
}

input[type="submit"]:hover {
    background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(102, 102, 102));
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
}

td {
    padding: 10px;
    vertical-align: top;
    border-bottom: 1px solid #333;
}

b {
    font-weight: bold;
}

hr {
    border: 0;
    height: 1px;
    background: linear-gradient(to right, transparent, #FFFFFF, transparent);
    margin: 20px 0;
}

pre {
    white-space: pre-wrap;
    background-color: rgba(139, 0, 0, 0.3);
    padding: 10px;
    border-radius: 5px;
    border-left: 3px solid #FFFFFF;
}

i {
    color: #AAA;
}

a {
    color: #FFFFFF;
    text-decoration: none;
}

a:hover {
    color: #FF4500;
    text-decoration: underline;
}

@font-face {
    font-family: 'DBZ Font';
    src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
}

.power-level {
    color:rgb(0, 0, 0);
    font-weight: bold;
    font-size: 18px;
}

.guild-badge {
    display: inline-block;
    background-color: rgb(2, 2, 2);
    padding: 2px 8px;
    border-radius: 10px;
    border: 1px solid #FFFFFF;
    margin-left: 5px;
}

.death-entry {
    background-color: rgba(139, 0, 0, 0.3);
    padding: 8px;
    margin: 5px 0;
    border-radius: 5px;
    border-left: 3px solid rgb(2, 2, 2);
}
</style>

<div id="content">
<div class="top">Character Lookup</div>
<div class="mid">
<form method="get" action="characters.php"> 
<input type="text" name="player_name" placeholder="Example: Tutor"/> 
<input type="submit" value="Search"/> 
</form>
<?php 

$player = new Player();
if (!empty($_GET['player_id']) && $player->load($_GET['player_id']) || !empty($_GET['player_name']) && $player->find($_GET['player_name'])){
	
	
    echo '<hr/>
	<div style="
		color:rgb(255, 255, 255);
		font-weight: bold;
		margin: 5px auto 5px;
		display: flex;
		align-items: center;
		justify-content: center;
	">
		Player information
	</div><table><tr><td>';
    echo '<b>Name: </b>'.htmlspecialchars($player->getAttr('name')).'<br/>';
    echo '<b>Level: </b>'.$player->getAttr('level').'<br/>';
    echo '<b>Magic Level: </b> '.$player->getAttr('maglevel').'<br/>';
    echo '<b>Vocation: </b> '.$cfg['vocations'][$player->getAttr('vocation')]['name'].'<br/>';

    if ($player->isAttr('guild_name')){
        echo '<b>Guild:</b> '.$player->getAttr('guild_rank').' del <a href="guilds.php?guild_id='.$player->getAttr('guild_id').'">'.htmlspecialchars($player->getAttr('guild_name')).'</a><span class="guild-badge">⚔</span><br/>';
    }
    
    $gender = Array('Femenino','Masculino');
    echo '<b>Gender:</b> '.$gender[$player->getAttr('sex')].'<br/>';
    if (!empty($cfg['temple'][$player->getAttr('city')]['name']))
        echo "<b>Residence:</b> ".ucfirst($cfg['temple'][$player->getAttr('city')]['name'])."<br/>";

    if ($player->isAttr('position')){
        echo "<b>Position: </b> ".$player->getAttr('position')."<br/>";
    }
    if ($player->isAttr('premend') && $player->getAttr('premend') > 0) {
        echo "<b>Premium: </b> ".ceil((time() - $player->getAttr('premend'))/(3600*24))." día(s) restantes<br/>";
    }
    
    if ($player->getAttr('lastlogin') == 0)
        $lastlogin = 'Never';
    else
        $lastlogin = date("jS F Y H:i:s",$player->getAttr('lastlogin'));
    echo "<b>Last Login: </b> ".$lastlogin."<br/>";
    if ($player->getAttr('redskulltime') > time()) echo '<b>Tiempo de Castigo:</b> '.ceil(($player->getAttr('redskulltime') - time())/60/60).' horas</b><br/>';
    if ($cfg['show_skills']){
        echo "</td><td>";
        $sn = $cfg['skill_names'];
        for ($i=0; $i < count($sn); $i++){
            echo '<b>'.ucfirst($sn[$i]).':</b> '.$player->getSkill($i)."<br/>";
        }
        echo '</td></tr>';
    }
    echo '</table>';
    $account = new Account();
    if ($account->load($player->getAttr('account')))
        if (strlen($account->getAttr('comment'))>0){
            echo "<b>HISTORIA DEL GUERRERO</b><br/><div style=\"overflow:hidden\"><pre>".htmlspecialchars($account->getAttr('comment'))."</pre></div><br/>";
        }    
    echo '<hr/>';
    if ($cfg['show_deathlist']){
        $deaths = $player->getDeaths();
        if ($deaths !== false && !empty($deaths)){
        echo '<b>DERROTAS EN BATALLA</b><br/>';
            foreach ($deaths as $death){
                $killer = new Player($death['killer']);
                if ($killer->exists())
                    $name = '<a href="characters.php?char='.$death['killer'].'">'.$death['killer'].'</a>';
                else
                    $name = $death['killer'];
                echo '<div class="death-entry"><i>'.date("jS F Y H:i:s",$death['date']).'</i> Derrotado en nivel '.$death['level'].' por '.$name.'</div>';
            }
        }
    }
}elseif (isset($_GET['player_id']) || isset($_GET['player_name'])) echo '<div style="text-align:center;color:#FF0000;font-size:18px;">Player not found</div>';
?>
</div>
<div class="bot"></div>
</div>
<?php include ("footer.inc.php");?>