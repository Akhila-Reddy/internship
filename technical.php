<?php @require_once('Connections/form.php'); ?>

<?php @require_once('Connections/form.php'); ?>
<?php
$cutoff=60;$total=25;
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO technical (username, password, score) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['uname'], "text"),
                       GetSQLValueString($_POST['password'], "int"),
                       GetSQLValueString($_POST['score'], "int"));

  mysql_select_db($database_form, $form);
  $Result1 = mysql_query($insertSQL, $form) or die(mysql_error());
   $insertGoTo = "techreport.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
$t=$cutoff*$total/100;
  $r="delete from gd where score<'$t'";
  $roi=mysql_query($r,$form);
?>
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
  $password=$_POST['password'];$_SESSION['p']=$password;
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "techreport.php";
  $MM_redirectLoginFailed = "technical.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_form, $form);
  
  $LoginRS__query=sprintf("SELECT username, password FROM gd WHERE username='%s' AND password='%s'",
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
  $t="delete from technical where password=$_SESSION[p]";
   $roi=mysql_query($t,$form);
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TECHNICAL</title>
<style type="text/css">
<!--
body {
	background-image: url(kuala_lumpur_petronas_twin_towers_malaysia_wallpaper-normal.jpg);
}
.style1 {
	color: #000033;
	font-weight: bold;
	font-size: 24px;
}
.style8 {font-size: 20px; font-style: italic; font-weight: bold; color: #000000; }
.style9 {color: #FFFFFF}
.style10 {font-size: 20px; font-style: italic; font-weight: bold; color: #FFFFFF; }
-->
</style></head>

<body>
<div align="center" class="style1">
  <p>TECHNICAL ROUND RESULTS STORING PAGE</p>
</div>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="354" height="212" border="0" cellpadding="2" cellspacing="1" bgcolor="#000000">
      <tr>
        <td width="116" height="61"><div align="center" class="style8 style9">USER NAME </div></td>
        <td width="227"><div align="center">
          <input name="uname" type="text" id="uname" />
        </div></td>
      </tr>
      <tr>
        <td height="51"><div align="center" class="style10">PASSWORD</div></td>
        <td><div align="center">
          <input name="password" type="password" id="password" />
        </div></td>
      </tr>
      <tr>
        <td height="50"><div align="center" class="style10">SCORE</div></td>
        <td><div align="center">
          <input name="score" type="text" id="score" />
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center">
          <input type="submit" name="Submit" value="Submit" />
        </div></td>
      </tr>
    </table>
  </div>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
