<?php 
/*
    Copyright (C) 2007 - 2008  Nicaw

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
*/
include ("include.inc.php");

$account = new Account();
if (!$account->load($_SESSION['account'])) {
    $_SESSION['account'] = '';
    header('location: login.php?redirect=account.php');
    die();
} else {
    $ptitle = "Account - $cfg[server_name]";
    include ("header.inc.php");
?>
    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
        }

        h3 {
            color: rgb(255, 255, 255);
            text-shadow: 1px 1px 2px #000;
            border-bottom: 2px solid rgb(46, 46, 46);
            padding-bottom: 5px;
            font-family: 'DBZ Font', 'Arial Black', sans-serif;
        }

        .task-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .points-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 600px; /* Limita el tamaño máximo si es necesario */
            margin: 0 auto;
            gap: 20px; /* Espacio entre los elementos */
        }

        /* Caja de los puntos */
        .points-box {
            background: linear-gradient(to right, #1e1e1e, #2c2c2c);
            color: rgb(255, 255, 255);
            padding: 15px 25px;
            border: 2px solid rgb(250, 250, 250);
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 0 12px rgba(253, 253, 253, 0.4);
            text-shadow: 1px 1px 0 #000;
            flex-grow: 1; /* Asegura que ocupe el máximo espacio disponible */
        }

        /* Puntos dentro de la caja */
        .points-box .points {
            color: #ffffff;
            background-color: #444;
            padding: 4px 10px;
            border-radius: 6px;
            margin-left: 5px;
            box-shadow: inset 0 0 5px #000;
        }

        /* Contenedor del botón */
        .buy-points-container {
            flex-shrink: 0; /* Impide que el botón se reduzca de tamaño */
        }

        /* Estilos para el botón */
        .buy-button {
            background-color: #ffcc00;
            color: #000;
            padding: 15px 25px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #e6b800;
        }


        .task-menu li {
            background-color: rgba(0, 0, 0, 0.5);
            color: rgb(255, 255, 255);
            padding: 12px;
            margin: 8px 0;
            cursor: pointer;
            border-radius: 6px;
            border-left: 4px solid rgb(0, 0, 0);
            transition: all 0.3s ease;
            font-weight: bold;
            background-position: 10px center;
            background-repeat: no-repeat;
            padding-left: 40px;
            display: flex;
            align-items: center;
        }

        .task-menu li:hover {
            background-color: rgba(0, 0, 0, 0.7);
            border-left: 4px solid rgb(255, 255, 255);
            transform: translateX(5px);
        }

        #ajax {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 5px;
        }

        /* Iconos temáticos DBZ */
        .task-menu li[style*="user_add.png"] 
        .task-menu li[style*="user_delete.png"] 
        .task-menu li[style*="user_edit.png"] 
        .task-menu li[style*="key.png"] 
        .task-menu li[style*="email.png"] 
        .task-menu li[style*="page_edit.png"]
        .task-menu li[style*="group_add.png"]
        .task-menu li[style*="resultset_previous.png"] n
        .task-menu li[style*="user.png"] 

        @font-face {
            font-family: 'DBZ Font';
            src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
        }
    </style>

    <div id="content">
        <div class="top">Account</div>
        <div class="mid">
            <div class="points-container">
                <div class="points-box">
                    <?php
                        $points = $account->getPremiumPoints();
                        echo "DBKOP Points : <span class='points'>$points</span>";
                    ?>
                </div>
                <div class="buy-points-container">
                    <button onclick="window.location.href='buy_points.php'" class="buy-button">Buy DBKOP Points</button>
                </div>
            </div>

            <table style="width: 100%">
                <tr style="vertical-align: top">
                    <td>
                        <h3>Pick a Task</h3>
                        <ul class="task-menu" style="width: 200px;">
                            <li onclick="ajax('form','modules/character_create.php','',true)" style="background-image: url(ico/user_add.png);">Create Character</li>
                            <li onclick="ajax('form','modules/character_delete.php','',true)" style="background-image: url(ico/user_delete.png);">Delete Character</li>
                            <?php if ($cfg['char_repair']) { ?>
                                <li onclick="ajax('form','modules/character_repair.php','',true)" style="background-image: url(ico/user_edit.png);">Repair Character</li>
                            <?php } ?>
                            <li onclick="ajax('form','modules/account_password.php','',true)" style="background-image: url(ico/key.png);">Change Password</li>
                            <li onclick="ajax('form','modules/account_email.php','',true)" style="background-image: url(ico/email.png);">Change Email</li>
                            <li onclick="ajax('form','modules/account_comments.php','',true)" style="background-image: url(ico/page_edit.png);">Edit Comments</li>
                            <li onclick="ajax('form','modules/guild_create.php','',true)" style="background-image: url(ico/group_add.png);">Create Guild</li>
                            <li onclick="window.location.href='login.php?logout&amp;redirect=account.php'" style="background-image: url(ico/resultset_previous.png);">Logout</li>
                        </ul>
                    </td>
                    <td>
                        <?php 
                        if (isset($account->players)) {
                            echo '<h3>Characters</h3>'."\n";
                            echo '<ul class="task-menu">';
                            foreach ($account->players as $player) {
                                echo '<li style="background-image: url(ico/user.png);" onclick="window.location.href=\'characters.php?player_id='.htmlspecialchars($player['id']).'\'">'.htmlspecialchars($player['name']).'</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div id="ajax"></div>
        <div class="bot"></div>
    </div>
<?php 
}
include ("footer.inc.php");
?>