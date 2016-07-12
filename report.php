<?php @require_once('Connections/form.php'); ?>
<?php
mysql_select_db($database_form, $form);
$query_Recordset1 = "select * from reg";
$Recordset1 = mysql_query($query_Recordset1, $form) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_form, $form);
$query_Recordset2 = "select name from images";
$Recordset2 = mysql_query($query_Recordset2, $form) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
 $_SESSION['x']=0;
function displayimage()
{
 $con=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$con);
 $qry="select * from images";
 $q="select min(password)+'$_SESSION[x]' from images";
 $result=mysql_query($qry,$con);
 $res=mysql_query($q,$con);
 $r = mysql_fetch_array($res);
 while($row=mysql_fetch_array($result)){
 if($row[0]==$r[0])
 {
  echo '<img height="80" width="120" src="data:image;base64,'.$row[2].' "> ';
  }  
} $_SESSION['x']=$_SESSION['x']+1;
 mysql_close($con);
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>REPORT</title>
<style type="text/css">
<!--
.style1 {
	font-size: 50px;
	color: #003399;
}
body {
	background-image: url(mini__light_to_blue___n___light_purple_by_penachio1-d51w58c.jpg);
}
.style2 {color: #330033}
.style6 {color: #000099; }
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p align="center" class="style1"><img src="images (5).jpg" width="60" height="69" />REPORT </p>
  <table width="2440" height="159" border="2" cellpadding="2" cellspacing="0">
    <tr>
      <td width="75"><span class="style2">Registration ID </span></td>
      <td width="59"><span class="style2">Firstname</span></td>
      <td width="58"><span class="style2">Lastname</span></td>
      <td width="33"><span class="style2">Date of birth </span></td>
      <td width="49"><span class="style2">Gender </span></td>
      <td width="75"><span class="style2">Qualification</span></td>
      <td width="43"><span class="style2">Stream</span></td>
      <td width="30"><span class="style2">Year</span></td>
      <td width="67"><span class="style2">Percentage</span></td>
      <td width="46"><span class="style2">College</span></td>
      <td width="31"><span class="style2">email</span></td>
      <td width="54"><span class="style2">Phone Number </span></td>
      <td width="37"><span class="style2">Mode</span></td>
      <td width="61"><span class="style2">Reference</span></td>
      <td width="85"><span class="style2">Additional Qualifications </span></td>
      <td width="54"><span class="style2">image name </span></td>
      <td width="121"><span class="style2">Image</span></td>
    </tr>
    <?php do { ?>
      <tr>
        <td height="66"><div align="center" class="style6"><?php echo $row_Recordset1['regid']; ?></div></td>
        <td><span class="style6"><?php echo $row_Recordset1['firstname']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['lastname']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['DOB']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['gender']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['Qualification']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['stream']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['year']; ?></span></td>
        <td><div align="center" class="style6"><?php echo $row_Recordset1['percentage']; ?></div></td>
        <td><span class="style6"><?php echo $row_Recordset1['college']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['email']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['phone_no']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['mode']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['reference']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset1['additional_qualifications']; ?></span></td>
        <td><span class="style6"><?php echo $row_Recordset2['name']; ?></span></td>
        <td><span class="style6">
          <?php displayimage(); ?>          
        &nbsp;</span></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
