<link rel="shortcut icon" href="logo.ico"/>
<?php @require_once('Connections/form.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user_name'])) {
  $loginUsername=$_POST['user_name'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.htm";
  $MM_redirectLoginFailed = "logfail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_form, $form);
  
  $LoginRS__query=sprintf("SELECT firstname, regid FROM reg WHERE firstname='%s' AND regid='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $form) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-image: url(background_login.jpg);
}
.style3 {color: #FFFFFF; font-size: 20px; }
.style4 {color: #FFFFFF; font-size: 24px; }
-->
</style></head>

<body>
<p align="center" class="style4">Login form</p>
<form id="frm_login" name="frm_login" method="POST" action="<?php echo $loginFormAction; ?>">
  <div align="center">
    <p>&nbsp;</p>
    <table width="364" height="173" border="1">
      <tr>
        <td><div align="center"><span class="style3">Username</span></div></td>
        <td><input name="user_name" type="text" id="user_name" /></td>
      </tr>
      <tr>
        <td><div align="center"><span class="style3">Password</span></div></td>
        <td><input name="password" type="password" id="password" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="submit" type="submit" id="submit" value="Submit" />
        <input name="Reset" type="reset" id="Reset" value="Reset" /></td>
      </tr>
    </table>
  </div>
</form>
<p align="center" class="style4">INVALID USER NAME OR PASSWORD </p>
</body>
</html>
