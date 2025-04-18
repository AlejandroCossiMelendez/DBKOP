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

########################## LOGIN ############################
if (isset($_POST['login_submit'])) {
    $account = new Account();
    try {
        if ($account->load($_POST['account'])) {
            if (
                $account->checkPassword($_POST['password']) || 
                (!$cfg['secure_session'] && (string)$_POST['password'] == sha1($account->getAttr('password').$_SERVER['HTTP_HOST']))
            ) {
                $_SESSION['account'] = $account->getAttr('accno');
                $_SESSION['remote_ip'] = $_SERVER['REMOTE_ADDR'];

                if (!empty($_COOKIE['remember'])) {
                    setcookie('account', $account->getAttr('accno'), time() + (30 * 24 * 3600), '/');
                    setcookie('password', sha1($account->getAttr('password').$_SERVER['HTTP_HOST']), time() + (30 * 24 * 3600), '/');
                }

                if (!empty($_GET['redirect'])) {
                    header('Location: '.$_GET['redirect']);
                    exit;
                }
            } else {
                $error = 'Incorrect password.';
            }
        } else {
            $error = 'Account not found.';
        }
    } catch (Exception $e) {
        $error = 'Wrong password or username.';
    }
}
########################## LOGOUT ###########################
elseif (isset($_GET['logout'])){
	$_SESSION['account'] = false;
}
elseif (!empty($_SESSION['account']) && !empty($_GET['redirect'])){
	header('location: '.$_GET['redirect']);
	die('Redirecting to <a href="'.$_GET['redirect'].'>'.$_GET['redirect'].'</a>');
}
########################## LOGIN FORM #######################
$ptitle="Account - $cfg[server_name]";
include ("header.inc.php");
?>
<script language="javascript" type="text/javascript">
//<![CDATA[
	function remember_toggle(node)
	{
		if (node.checked){
			Cookies.create('remember','yes',30);
		}else{
			Cookies.erase('account');
			Cookies.erase('password');
			Cookies.erase('remember');
			document.getElementById('account').value = '';
			document.getElementById('password').value = '';
		}
	}
//]]>
</script>

<style>
fieldset {
    border: 2px solid #FFFF;
    border-radius: 8px;
    margin-bottom: 20px;
}

legend {
    color: #FFFF;
    font-weight: bold;
    font-size: 18px;
    padding: 0 10px;
    text-shadow: 1px 1px 2px #000;
}

.textfield {
    background-color: #222;
    color: #FFFF;
    border: 1px solid #FF0000;
    padding: 5px;
}

.textfield:focus {
    border-color: #FFFF;
    box-shadow: 0 0 5px #FFFF;
}

input[type="submit"] {
    background: linear-gradient(to bottom, #FF0000, #8B0000);
    color: #FFFF;
    border: none;
    padding: 5px 15px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background: linear-gradient(to bottom, #FF4500, #B22222);
}

.task-menu li {
    background-color: rgba(139, 0, 0, 0.5);
    color: #FFFF;
    padding: 10px;
    margin: 5px 0;
    cursor: pointer;
    border-radius: 4px;
    border-left: 3px solid #FF0000;
}

.task-menu li:hover {
    background-color: rgba(255, 0, 0, 0.5);
    border-left: 3px solid #FFFF;
}
.error-message {
    background: linear-gradient(to right, #2e2e2e, #1a1a1a);
    color:rgb(255, 255, 255);
    font-weight: bold;
    text-align: center;
    padding: 15px 20px;
    margin-bottom: 20px;
    border: 2px solidrgb(248, 248, 248);
    border-radius: 8px;
    font-family: 'Courier New', monospace;
    font-size: 16px;
    text-shadow: 1px 1px 0px #000;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
}



@font-face {
    font-family: 'DBZ Font';
    src: url('https://www.fontsaddict.com/fontface/saiyan-sans.ttf');
}
</style>

<div id="content">
<div class="top">Login</div>
<div class="mid">
    
<fieldset>
<legend><b>Account Login</b></legend>
<form id="login_form" action="login.php?redirect=<?php echo htmlspecialchars($_GET['redirect'])?>" method="post">
<table>
<tr><td style="text-align: right"><label for="account">Account</label>&nbsp;</td>
<?php
if (isset($_POST['login_submit'])) {
	$account = $_POST['account'];
	$password = $_POST['password'];
} elseif (!empty($_COOKIE['remember']) && isset($_COOKIE['account'], $_COOKIE['password'])) {
	$account = $_COOKIE['account'];
	$password = $_COOKIE['password'];
}
?>
<td><input id="account" name="account" type="password" class="textfield" maxlength="8" size="10" tabindex="101" value="<?php echo htmlspecialchars($account);?>"/></td>
<td <?php if ($cfg['secure_session']) echo ' style="visibility: hidden"';?>>&nbsp;<input id="remember" name="remember" type="checkbox" tabindex="103" onclick="remember_toggle(this)"<?php if (!empty($_COOKIE['remember'])) echo ' checked="checked"';?>/>&nbsp;<label for="remember">Remember Me?</label></td></tr>
<tr><td style="text-align: right"><label for="password">Password</label>&nbsp;</td>
<td><input id="password" name="password" type="password" class="textfield" maxlength="100" size="10" tabindex="102" value="<?php echo htmlspecialchars($password);?>"/></td>
<td>&nbsp;<input type="submit" name="login_submit" value="Sign in" tabindex="104"/></td></tr>
</table>
</form>
<br>
<?php if (!empty($error)) {
    echo '<div class="error-message">'.htmlspecialchars($error).'</div>';
} ?>

</fieldset>
<fieldset>
<legend>More Options</legend>
<ul class="task-menu" style="width: 200px;">
  <li onclick="ajax('form','modules/account_create.php','',true)" style="display: flex; align-items: center;">
    <img src="ico/esfera.png" alt="Dragon Ball" style="width: 24px; height: 24px; margin-right: 10px;">
    New Account
  </li>

  <?php if($cfg['Email_Recovery']){ ?>
    <li onclick="ajax('form','modules/account_recover.php','',true)" style="display: flex; align-items: center;">
      <img src="ico/senzu.png" alt="Senzu Bean" style="width: 24px; height: 24px; margin-right: 10px;">
      Recover Account
    </li>
  <?php } ?>
</ul>

</fieldset>
</div>
<div class="bot"></div>
</div>
<?php include ("footer.inc.php");?>