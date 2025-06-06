<?php 
/*
    Copyright (C) 2007 - 2008  Nicaw

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/
include ("include.inc.php");

if (isset($_GET['RSS2'])){
header("Content-type: application/rss+xml");

echo '<?xml version="1.0"?><rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/"><channel><title>'.htmlspecialchars($cfg['server_name']).' News</title><link>'.htmlspecialchars($cfg['server_url']).'</link><description>Server news contains latest information about updates, downtimes and events.</description>';

$mysql = new SQL();
$sql = $mysql->myQuery('SELECT * FROM `nicaw_news` ORDER BY `date` DESC LIMIT 10');
if ($sql === false) 
	throw new Exception('SQL query failed:<br/>'.$SQL->getError());
while ($a = $mysql->fetch_array()){
  echo '<item>';
  echo '<guid>http://'.htmlspecialchars($cfg['server_url'].$_SERVER['PHP_SELF'].'?id='.$a['id']).'</guid>';
  echo '<title>'.htmlspecialchars($a['title']).'</title>';
  echo '<pubDate>' . date('D, d M Y H:i:s O', strtotime($a['date'])) . '</pubDate>';
  
  echo '<dc:creator>'.htmlspecialchars($a['creator']).'</dc:creator>';
  if ((bool)(int)$a['html']){
    echo '<content:encoded>'.htmlspecialchars($a['text']).'</content:encoded>';
  }else{
    require_once('extensions/simple_bb_code.php');
    $bb = new Simple_BB_Code();
    echo '<content:encoded>'.htmlspecialchars($bb->parse($a['text'])).'</content:encoded>';
  }
  echo '</item>';
}
echo '</channel></rss>';

}else{
$ptitle= "News - $cfg[server_name]";
include ("header.inc.php");
?>
<div id="content">
  <div class="top">Server News</div>
  <div class="mid">
    <a href="news.php?RSS2" style="text-decoration: none; float: right;">
      <img src="ico/feed.png" title="Subscribe to RSS" alt="rss" style="vertical-align: middle;"/>
    </a>
    <div style="clear: both;"></div>

    <?php 
    $mysql = new SQL();
    if (isset($_GET['id']))
      $mysql->myQuery('SELECT * FROM `nicaw_news` WHERE `id` = \''.mysql_escape_string((int)$_GET['id']).'\'');
    else
      $mysql->myQuery('SELECT * FROM `nicaw_news` ORDER BY `date` DESC LIMIT 10');

    if ($mysql->failed())
      throw new Exception('SQL query failed:<br/>'.$mysql->getError());

    while ($a = $mysql->fetch_array()){
      echo '<table cellspacing="0" cellpadding="4" width="100%" style="box-shadow: 0 0 10px #000000aa; border: 2px solid #444;  border-radius: 10px; background: #1e1e1e; color: #ddd; margin-bottom: 10px; font-family: monospace;">';
      echo '<tr><td style=" color: #ffcc00; font-weight: bold; border-bottom: 1px solid #444;">';
      echo date("jS F Y", strtotime($a['date'])) . ' - '.htmlspecialchars($a['creator']);
      echo '</td></tr>';
      echo '<tr><td style="color: #ffffff; font-size: 14px; font-weight: bold; padding-top: 6px;">';
      echo htmlspecialchars($a['title']);
      echo '</td></tr>';
      echo '<tr><td style="padding-top: 5px; font-size: 13px;">';
      if ((bool)(int)$a['html']){
        echo $a['text'];
      } else {
        require_once('extensions/simple_bb_code.php');
        $bb = new Simple_BB_Code();
        echo $bb->parse($a['text']);
      }
      echo '</td></tr>';
      echo '</table>';
    }
    ?>
  </div>
  <div class="bot"></div>
</div>


<div class="bot"></div>
</div>
<?php include ("footer.inc.php");}?>