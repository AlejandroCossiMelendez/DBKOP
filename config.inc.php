<?php 
##################################################
#                 CONFIGURATION                  #
##################################################
# Congratulations on finding configuration file. #
# This is very simililar to config.lua as it     #
# follows same basic principles. Text in between #
# /* */ or starting with # is ignored. Text      #
# values must be 'qouted'. Logical values are    #
# true/false. All statements end with ;          #
##################################################

# Set data directory of your OT server
$cfg['dirdata'] = 'C:\Users\usuario\Desktop\Sena\dbko';

$cfg['house_file'] = 'world/Tibia-house.xml';

# MySQL server settings
$cfg['SQL_Server'] = 'localhost';
$cfg['SQL_User'] = 'root';
$cfg['SQL_Password'] = '';
$cfg['SQL_Database'] = 'dbko';

# Must correspond to your OTServ configuration
# Options: plain, md5, sha1
$cfg['password_type'] = 'plain';

# Not currently supported by OTServ, leave empty
$cfg['password_salt'] = '';

# Skin files can be found in skins folder.
# Each css file represents a skin
$cfg['skin'] = 'swampp';

# In case you want to upload skins somewhere else
$cfg['skin_url'] = 'skins/';

# Captcha is used to prevent automated software from flooding server with accounts
$cfg['use_captcha'] = true;

# Secure session will disable 'remember me' box
$cfg['secure_session'] = false;

# Seconds until session expires
$cfg['timeout_session'] = 15*60;

# Maximum number of characters on account
$cfg['maxchars'] = 10;

# Players per highscore page
$cfg['ranks_per_page'] = 50;

# This access and above will not be in highscores
$cfg['ranks_access'] = 2;

# Home page
$cfg['start_page'] = 'notes.php';

# Name shown in window title
$cfg['server_name'] = 'Dbkop';

# Server ip and port for getting status. 
# In most cases localhost should be used
$cfg['server_ip'] = 'localhost';
$cfg['server_port'] = 7171;

# Allow teleportation to temple?
$cfg['char_repair'] = false;

# Force users to validate their emails when registering?
# For email functions to work, SMTP server must be configured correctly
$cfg['Email_Validate'] = false;

# Allow email based account recovery?
$cfg['Email_Recovery'] = true;

# Enable extension=php_openssl.dll in php.ini in order to use gmail
$cfg['SMTP_Host'] = 'elitecorujao@hotmail.com';
$cfg['SMTP_Port'] = 25;
$cfg['SMTP_Auth'] = true;
$cfg['SMTP_User'] = 'jacolos_ots@wp.pl';
$cfg['SMTP_Password'] = '2';
$cfg['SMTP_From'] = '';

# Example configuration for mercury
/*
$cfg['SMTP_Host'] = 'localhost';
$cfg['SMTP_Port'] = 25;
$cfg['SMTP_Auth'] = false;
$cfg['SMTP_User'] = 'user@gmail.com';
$cfg['SMTP_Password'] = 'user';
$cfg['SMTP_From'] = 'user@gmail.com';
*/

# Whether to show skills in character search
$cfg['show_skills'] = true;

# Whether to show deathlist in character search, DevLand only
$cfg['show_deathlist'] = false;

$cfg['skill_names'] = array('Speed', 'Attack Speed', 'Critic Attack', 'Fighting', 'Ki Blasting', 'Defense', 'Energy');

# Name formating was moved to globals.php

# Banned names
$cfg['invalid_names'] = array('^gm','^god','admin','fuck','gamemaster', 'owner');

# Accounts that are allowed to access admin panel
# Example: array(123123,204951203);
$cfg['admin_accounts'] = array();

# Listed IPs always allowed to access admin panel, no matter if it has account or not
$cfg['admin_ip'] = array('localhost');

# Player can only delete himself after specified time (seconds)
$cfg['player_delete_interval'] = 24*3600;

# Minimum level to create own guild. Cannot be lower than $cfg['guild_level']
$cfg['guild_leader_level'] = 20;

# Please disable guild manager if your server features guild editing
$cfg['guild_manager_enabled'] = true;

# Online status update interval (seconds). Should match statustimeout in your otserv configuration
$cfg['status_update_interval'] = 5*60;


##################################################
#                 Town Config                    #
##################################################
/*
NOTICE
Town IDs must be correct and match those in your map
*/
# Town names
$cfg['temple'][1]['name'] = 'Small city';


# Now set which town(s) you want to use in character making
$cfg['temple'][1]['x'] = 306;
$cfg['temple'][1]['y'] = 46;
$cfg['temple'][1]['z'] = 5;
$cfg['temple'][1]['enabled'] = true;


##################################################
#                 Vocation Config                #
##################################################
/*
Notice:
It's only one item per slot. You need to script special onLogin event in OTServ to add more items to new players.
*/

################# No Vocation ####################
$id = 0;
$cfg['vocations'][$id]['name'] = 'No Vocation';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 150;
$cfg['vocations'][$id]['mana'] = 0;
$cfg['vocations'][$id]['cap'] = 400;
$cfg['vocations'][$id]['enabled'] = false;

$cfg['vocations'][$id]['look'][0] = 138;
$cfg['vocations'][$id]['look'][1] = 130;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

$cfg['vocations'][$id]['equipment'][3] = 3939;
$cfg['vocations'][$id]['equipment'][4] = 2650;
$cfg['vocations'][$id]['equipment'][5] = 2382;
$cfg['vocations'][$id]['equipment'][10] = 2050;

################# Goku #######################
$id = 1;
$cfg['vocations'][$id]['name'] = 'Goku';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 69;
$cfg['vocations'][$id]['look'][1] = 69;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

$cfg['vocations'][$id]['equipment'][2] = 2003;
################# vegeta ##########################
$id = 6;
$cfg['vocations'][$id]['name'] = 'Gohan';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 62;
$cfg['vocations'][$id]['look'][1] = 62;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Palladin #######################
$id = 76;
$cfg['vocations'][$id]['name'] = 'Goten';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 250;
$cfg['vocations'][$id]['look'][1] = 250;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

$cfg['vocations'][$id]['equipment'][10] = 2050;

################# Knight #########################
$id = 2;
$cfg['vocations'][$id]['name'] = 'Vegeta';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 73;
$cfg['vocations'][$id]['look'][1] = 73;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 7;
$cfg['vocations'][$id]['name'] = 'Trunks';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 158;
$cfg['vocations'][$id]['look'][1] = 158;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

$cfg['vocations'][$id]['equipment'][10] = 2050;

################# Knight #########################
$id = 78;
$cfg['vocations'][$id]['name'] = 'Chibi Trunks';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 51;
$cfg['vocations'][$id]['look'][1] = 51;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Knight #########################
$id = 12;
$cfg['vocations'][$id]['name'] = 'Brolly';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 84;
$cfg['vocations'][$id]['look'][1] = 84;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


$cfg['vocations'][$id]['equipment'][2] = 2003;
################# Knight #########################
$id = 3;
$cfg['vocations'][$id]['name'] = 'NamekJin';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 50;
$cfg['vocations'][$id]['look'][1] = 50;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 5;
$cfg['vocations'][$id]['name'] = 'Android C17';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 15;
$cfg['vocations'][$id]['look'][1] = 15;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 13;
$cfg['vocations'][$id]['name'] = 'Andorid C18';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 15;
$cfg['vocations'][$id]['look'][1] = 15;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 9;
$cfg['vocations'][$id]['name'] = 'Freeza';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 101;
$cfg['vocations'][$id]['look'][1] = 101;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 8;
$cfg['vocations'][$id]['name'] = 'Cell';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 52;
$cfg['vocations'][$id]['look'][1] = 52;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 10;
$cfg['vocations'][$id]['name'] = 'Buu';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 34;
$cfg['vocations'][$id]['look'][1] = 34;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 11;
$cfg['vocations'][$id]['name'] = 'Tsuful';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 167;
$cfg['vocations'][$id]['look'][1] = 167;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 91;
$cfg['vocations'][$id]['name'] = 'Cooler';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 190;
$cfg['vocations'][$id]['look'][1] = 190;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 100;
$cfg['vocations'][$id]['name'] = 'Bardock';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 60;
$cfg['vocations'][$id]['look'][1] = 60;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

$cfg['vocations'][$id]['equipment'][2] = 2003;

################# Knight #########################
$id = 105;
$cfg['vocations'][$id]['name'] = 'Uub';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 281;
$cfg['vocations'][$id]['look'][1] = 281;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;


################# Knight #########################
$id = 109;
$cfg['vocations'][$id]['name'] = 'Dende';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 223;
$cfg['vocations'][$id]['look'][1] = 223;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Pan #########################
$id = 303;
$cfg['vocations'][$id]['name'] = 'Pan';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 329;
$cfg['vocations'][$id]['look'][1] = 329;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Videl #########################
$id = 333;
$cfg['vocations'][$id]['name'] = 'Videl';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 334;
$cfg['vocations'][$id]['look'][1] = 334;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Janemba #########################
$id = 314;
$cfg['vocations'][$id]['name'] = 'Janemba';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 326;
$cfg['vocations'][$id]['look'][1] = 326;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Shin #########################
$id = 324;
$cfg['vocations'][$id]['name'] = 'Shin';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 241;
$cfg['vocations'][$id]['look'][1] = 241;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Krilan #########################
$id = 353;
$cfg['vocations'][$id]['name'] = 'Krilan';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 356;
$cfg['vocations'][$id]['look'][1] = 356;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Tenshin #########################
$id = 343;
$cfg['vocations'][$id]['name'] = 'Tenshin';
$cfg['vocations'][$id]['level'] = 1;
$cfg['vocations'][$id]['maglevel'] = 0;
$cfg['vocations'][$id]['health'] = 250;
$cfg['vocations'][$id]['mana'] = 250;
$cfg['vocations'][$id]['cap'] = 500;
$cfg['vocations'][$id]['enabled'] = true;

$cfg['vocations'][$id]['look'][0] = 349;
$cfg['vocations'][$id]['look'][1] = 349;

$cfg['vocations'][$id]['skills'][0] = 1;
$cfg['vocations'][$id]['skills'][1] = 1;
$cfg['vocations'][$id]['skills'][2] = 1;
$cfg['vocations'][$id]['skills'][3] = 1;
$cfg['vocations'][$id]['skills'][4] = 1;
$cfg['vocations'][$id]['skills'][5] = 1;
$cfg['vocations'][$id]['skills'][6] = 1;

################# Other IDs ######################

$cfg['vocations'][15]['name'] = 'Goku';
$cfg['vocations'][16]['name'] = 'Goku';
$cfg['vocations'][17]['name'] = 'Goku';
$cfg['vocations'][18]['name'] = 'Goku';
$cfg['vocations'][19]['name'] = 'Goku';
$cfg['vocations'][20]['name'] = 'Goku';
$cfg['vocations'][21]['name'] = 'Vegeta';
$cfg['vocations'][22]['name'] = 'Vegeta';
$cfg['vocations'][23]['name'] = 'Vegeta';
$cfg['vocations'][24]['name'] = 'Vegeta';
$cfg['vocations'][25]['name'] = 'Vegeta';
$cfg['vocations'][26]['name'] = 'Vegeta';
$cfg['vocations'][27]['name'] = 'Gohan';
$cfg['vocations'][28]['name'] = 'Gohan';
$cfg['vocations'][29]['name'] = 'Gohan';
$cfg['vocations'][30]['name'] = 'Gohan';
$cfg['vocations'][90]['name'] = 'Gohan';
$cfg['vocations'][77]['name'] = 'Goten';
$cfg['vocations'][80]['name'] = 'Gotenks';
$cfg['vocations'][81]['name'] = 'Gotenks';
$cfg['vocations'][82]['name'] = 'Gotenks';
$cfg['vocations'][83]['name'] = 'Gotenks';
$cfg['vocations'][84]['name'] = 'Gotenks';
$cfg['vocations'][85]['name'] = 'Gotenks';
$cfg['vocations'][31]['name'] = 'Trunks';
$cfg['vocations'][32]['name'] = 'Trunks';
$cfg['vocations'][33]['name'] = 'Trunks';
$cfg['vocations'][34]['name'] = 'Trunks';
$cfg['vocations'][35]['name'] = 'Trunks';
$cfg['vocations'][79]['name'] = 'Chibi Trunks';
$cfg['vocations'][62]['name'] = 'Brolly';
$cfg['vocations'][63]['name'] = 'Brolly';
$cfg['vocations'][64]['name'] = 'Brolly';
$cfg['vocations'][41]['name'] = 'NamekJin';
$cfg['vocations'][42]['name'] = 'NamekJin';
$cfg['vocations'][43]['name'] = 'NamekJin';
$cfg['vocations'][44]['name'] = 'NamekJin';
$cfg['vocations'][13]['name'] = 'Android';
$cfg['vocations'][68]['name'] = 'Android';
$cfg['vocations'][69]['name'] = 'Android';
$cfg['vocations'][70]['name'] = 'Android';
$cfg['vocations'][71]['name'] = 'Android';
$cfg['vocations'][72]['name'] = 'Android Woman';
$cfg['vocations'][73]['name'] = 'Android Woman';
$cfg['vocations'][74]['name'] = 'Android Woman';
$cfg['vocations'][75]['name'] = 'Android Woman';
$cfg['vocations'][45]['name'] = 'Freeza';
$cfg['vocations'][46]['name'] = 'Freeza';
$cfg['vocations'][47]['name'] = 'Freeza';
$cfg['vocations'][48]['name'] = 'Freeza';
$cfg['vocations'][49]['name'] = 'Freeza';
$cfg['vocations'][50]['name'] = 'Freeza';
$cfg['vocations'][51]['name'] = 'Cell';
$cfg['vocations'][52]['name'] = 'Cell';
$cfg['vocations'][53]['name'] = 'Cell';
$cfg['vocations'][54]['name'] = 'Buu';
$cfg['vocations'][55]['name'] = 'Buu';
$cfg['vocations'][56]['name'] = 'Buu';
$cfg['vocations'][57]['name'] = 'Buu';
$cfg['vocations'][58]['name'] = 'Buu';
$cfg['vocations'][59]['name'] = 'Tsuful';
$cfg['vocations'][60]['name'] = 'Tsuful';
$cfg['vocations'][61]['name'] = 'Tsuful';
$cfg['vocations'][96]['name'] = 'Tsuful';
$cfg['vocations'][92]['name'] = 'Cooler';
$cfg['vocations'][93]['name'] = 'Cooler';
$cfg['vocations'][94]['name'] = 'Cooler';
$cfg['vocations'][95]['name'] = 'Cooler';
$cfg['vocations'][101]['name'] = 'Bardock';
$cfg['vocations'][102]['name'] = 'Bardock';
$cfg['vocations'][103]['name'] = 'Bardock';
$cfg['vocations'][104]['name'] = 'Bardock';
$cfg['vocations'][106]['name'] = 'Uub';
$cfg['vocations'][107]['name'] = 'Uub';
$cfg['vocations'][108]['name'] = 'Uub';
$cfg['vocations'][110]['name'] = 'Dende';
$cfg['vocations'][111]['name'] = 'Dende';
$cfg['vocations'][112]['name'] = 'Dende';