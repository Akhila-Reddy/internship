<link rel="shortcut icon" href="logo.ico"/>
<?php @require_once('Connections/form.php'); ?>
<?php
mysql_select_db($database_form, $form);
$query_Recordset1 = "select * from technical";
$Recordset1 = mysql_query($query_Recordset1, $form) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TECHNICAL ROUND REPORT</title>
<style type="text/css">
<!--
body {
	background-image: url(mini__light_to_blue___n___light_purple_by_penachio1-d51w58c.jpg);
}
.style1 {
	font-size: 24px;
	color: #FF0000;
}
.style2 {color: #000066}
-->
</style></head>

<body>
<div align="center" class="style1">TECHNICAL ROUND REPORT</div>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>&nbsp;</p>
    <table width="560" border="2" cellspacing="1" cellpadding="2">
      <tr>
        <td>CANDIDATE NAME </td>
        <td>REGISTRATION ID </td>
        <td>SCORE</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><span class="style2"><?php echo $row_Recordset1['username']; ?></span></td>
          <td><span class="style2"><?php echo $row_Recordset1['password']; ?></span></td>
          <td><span class="style2"><?php echo $row_Recordset1['score']; ?></span></td>
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
