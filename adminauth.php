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

if (isset($_POST['uname'])) {
  $loginUsername=$_POST['uname'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.html";
  $MM_redirectLoginFailed = "adminauth.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_form, $form);
  
  $LoginRS__query=sprintf("SELECT username, password FROM admin WHERE username='%s' AND password='%s'",
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
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIN AUTHENTICATION PAGE</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	color: #FFFFFF;
}
body {
	background-image: url(StFrancisSchool_Background.jpg);
}
.style4 {color: #FFFFFF; font-size: 20px; }
-->
</style>
</head>

<body>
<div align="center" class="style1">
  <p>ADMIN AUTHENTICATION PAGE </p>
  <p><img src="images (4).jpg" width="255" height="61" /></p>
</div>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="529" height="176" border="2" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF">
      <tr>
        <td><div align="center"><span class="style4">Username</span></div></td>
        <td width="267"><div align="center">
          <input name="uname" type="text" id="uname" />
        </div></td>
      </tr>
      <tr>
        <td width="163"><div align="center"><span class="style4">Password</span></div></td>
        <td><div align="center">
          <input name="password" type="password" id="password" />
        </div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td><div align="center">
          <input type="submit" name="Submit" value="Submit" />
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
<p>&nbsp;</p>
</body>
</html>
