<?php 
//page generation time
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;

error_reporting(E_ALL ^ E_NOTICE);
session_start();

//emulate register_globals = off
if (ini_get('register_globals')){
	if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) {
	    die('GLOBALS overwrite attempt detected');
	}

	// Variables that shouldn't be unset
	$noUnset = array('GLOBALS',  '_GET',
	                 '_POST',    '_COOKIE',
	                 '_REQUEST', '_SERVER',
	                 '_ENV',     '_FILES');

	$input = array_merge($_GET,    $_POST,
	                     $_COOKIE, $_SERVER,
	                     $_ENV,    $_FILES,
	                     isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());
	
	foreach ($input as $k => $v) {
	    if (!in_array($k, $noUnset) && isset($GLOBALS[$k])) {
	        unset($GLOBALS[$k]);
	    }
	}
}
// magic_quotes_gpc fue eliminada en PHP 8, pero por compatibilidad
// eliminamos manualmente los slashes si los datos parecen tenerlos
function deep_stripslashes($value) {
    return is_array($value) ? array_map('deep_stripslashes', $value) : stripslashes($value);
}

// Solo ejecuta si detectas que hay slashes (esto depende de tus datos de entrada)
$_POST = array_map('deep_stripslashes', $_POST);
$_GET = array_map('deep_stripslashes', $_GET);
$_COOKIE = array_map('deep_stripslashes', $_COOKIE);
$_REQUEST = array_map('deep_stripslashes', $_REQUEST);


require ('config.inc.php');
require ('class/globals.php');
require ('class/sql.php');
require ('class/account.php');
require ('class/player.php');
require ('class/guild.php');
require ('class/iobox.php');

//set custom exception handler
set_exception_handler('exception_handler');

//just make sure GD extension is loaded before using CAPTCHA
$cfg['use_captha'] = $cfg['use_captcha'] && extension_loaded('gd');

//store server URL in variable for redirecting
if ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443)
	$cfg['server_url'] = $_SERVER['SERVER_NAME'];
else
	$cfg['server_url'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
$cfg['server_href'] = 'http://'.$cfg['server_url'].dirname(htmlspecialchars($_SERVER['PHP_SELF'])).'/';

//Anti session hijacking
if (!empty($_SESSION['account']) && ($_SERVER['REMOTE_ADDR'] != $_SESSION['remote_ip'] || (time() - $_SESSION['last_activity'] > $cfg['timeout_session']) && empty($_COOKIE['remember'])))
	unset($_SESSION['account']);

//Autologin
if (!$cfg['secure_session'] && !empty($_COOKIE['remember']) && $_SESSION['account'] === null){
	$account = new Account();
	if ($account->load($_COOKIE['account']) && (string)$_COOKIE['password'] == sha1($account->getAttr('password').$_SERVER['HTTP_HOST'])){
		$_SESSION['account']=$account->getAttr('accno');
		$_SESSION['remote_ip']=$_SERVER['REMOTE_ADDR'];
	}
}
$_SESSION['last_activity'] = time();

//Check if extensions loaded
if (!extension_loaded('simplexml'))
	throw new Exception('SimpleXML extension is not installed');
	
//Set AAC version
$cfg['aac_version'] = 'sql_3.20c';
?>