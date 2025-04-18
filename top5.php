$query = mysql_query("select * from players order by level desc");
        while($top5 = mysql_fetch_array($query))
        {
                $server['content'] .= 'Nome: <a href="?p=characters&name='.$top5['name'].'">'.$top5['name'].'</a> - Level: '.$top5['level'].'';
        }