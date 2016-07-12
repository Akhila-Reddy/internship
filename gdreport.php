<?php @require_once('Connections/form.php'); ?>
<?php
mysql_select_db($database_form, $form);
$query_Recordset1 = "select * from gd";
$Recordset1 = mysql_query($query_Recordset1, $form) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>REPORT FOR GROUP DISCUSSION</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	color: #990000;
}
.style2 {color: #0000FF}
body {
	background-image: url(mini__light_to_blue___n___light_purple_by_penachio1-d51w58c.jpg);
}
.style3 {color: #330033}
-->
</style>
</head>

<body>
<div align="center" class="style1">Group Discussion (Or) Just A Minute Report</div>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;</p>
    <table width="701" height="86" border="2" cellpadding="2" cellspacing="1">
      <tr>
        <td><div align="center"><span class="style2">CANDIDATE NAME</span> </div></td>
        <td><div align="center"><span class="style2">REGISTRATION ID </span></div></td>
        <td><div align="center"><span class="style2">SCORE</span></div></td>
      </tr>
      <?php do { ?>
        <tr>
          <td><div align="center" class="style3"><?php echo $row_Recordset1['username']; ?></div></td>
          <td><div align="center" class="style3"><?php echo $row_Recordset1['password']; ?></div></td>
          <td><div align="center" class="style3"><?php echo $row_Recordset1['score']; ?></div></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
  </div>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
