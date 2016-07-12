<?php @require_once('Connections/form.php'); ?>
<?php
$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_form, $form);
$query_Recordset1 = "SELECT * FROM reg WHERE regid in (SELECT max(regid) FROM reg)";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $form) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ACKNOWLEDGE</title>
<style type="text/css">
<!--
.style3 {font-size: 24px}
.style5 {font-size: x-large}
.style6 {font-size: xx-large}
body {
	background-image: url();
}
.style7 {
	color: #000066;
	font-style: italic;
	font-weight: bold;
}
.style8 {color: #000066}
.style10 {font-size: 18px; color: #000033; }
-->
</style>
</head>

<body>
<p class="style2 style6"><legend class="style7">
COPY FOR THE CANDIDATE:</legend>
</p>
<fieldset style="width:30%">
<form id="form1" name="form1" method="post" action="">
  <table width="929"  border="0">
    <tr>
      <td width="599" height="103"><span class="style3"><span class="style8">Registration Number :</span> <?php echo $row_Recordset1['regid']; ?></span></td>
      <td width="320"><?php

displayimage();
function displayimage()
{
 $con=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$con);
 $qry="select * from images";
 $q="select max(password) from images"; $t="select max(regid) from reg"; $tee=mysql_query($t,$con);
 $te = mysql_fetch_array($tee);
 $result=mysql_query($qry,$con);
 $res=mysql_query($q,$con);
 $r = mysql_fetch_array($res);
 while($row = mysql_fetch_array($result))
 {
    
	if($row[0]==$r[0] && $te[0]==$row[0])
	{
       echo '<img height="175" width="175" src="data:image;base64,'.$row[2].' "> ';
    }
 }
 mysql_close($con);
}
?></td>
    </tr>
  </table>
  <?php do { ?>
    <table width="664" height="177" border="0">
      <tr>
        <td width="299" height="35"><span class="style10">First Name </span></td>
        <td width="349">:
          <input name="first_name" type="text" id="first_name" value="<?php echo $row_Recordset1['firstname']; ?>" size="40" /></td>
      </tr>
      <tr>
        <td height="38"><span class="style10">Last Name (Surname) </span></td>
        <td>:
          <input name="surname" type="text" id="surname" value="<?php echo $row_Recordset1['lastname']; ?>" size="40" /></td>
      </tr>
      <tr>
        <td height="33"><p class="style10">Educational Qualification </p></td>
        <td>:
          <input name="specialization" type="text" id="specialization" value="<?php echo $row_Recordset1['Qualification']; ?>" size="40" /></td>
      </tr>
      <tr>
        <td height="26"><span class="style10">Date of Examination </span></td>
        <td>:
          <input name="DOE" type="text" id="DOE" size="40" /></td>
      </tr>
      <tr>
        <td height="33"><span class="style10">Time</span></td>
        <td>:
          <input name="time" type="text" id="time" size="40" /></td>
      </tr>
    </table>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <p>
      <a href="index.html"><input name="Button" type="button" class="style10" value="DONE" />
      </a>
  </p>
</form>
<p class="style2 style5">&nbsp;</p>
</fieldset>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
