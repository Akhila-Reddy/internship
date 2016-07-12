<?php @require_once('Connections/form.php'); ?>
<?php
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);
?>
<?php
$min_percentage=60;
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
$coni=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$coni);
 $roi="select ifnull(max(regid),0)+1 from reg";
 $rea=mysql_query($roi,$coni);
 $pt = mysql_fetch_array($rea);

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
$con=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$con);
 
 $w="select ifnull(max(password),0) from images";

 $wee=mysql_query($w,$con);
 $we = mysql_fetch_array($wee);
 



  $insertSQL = sprintf("INSERT INTO reg (regid,firstname, lastname, Qualification, stream, `year`, percentage, college, email, phone_no, mode, reference, additional_qualifications, gender, DOB) VALUES ('$pt[0]',%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['surname'], "text"),
                       GetSQLValueString($_POST['specialization'], "text"),
                       GetSQLValueString($_POST['stream'], "text"),
                       GetSQLValueString($_POST['year'], "int"),
                       GetSQLValueString($_POST['percentage'], "double"),
                       GetSQLValueString($_POST['college'], "text"),
                       GetSQLValueString($_POST['email_id'], "text"),
                       GetSQLValueString($_POST['phone_no'], "bigint"),
                       GetSQLValueString($_POST['mode'], "text"),
                       GetSQLValueString($_POST['ref'], "text"),
                       GetSQLValueString($_POST['extra_quali'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['yr'].$_POST['mh'].$_POST['dt'], "date"));
					   mysql_select_db($database_form, $form);
  $Result1 = mysql_query($insertSQL, $form) or die(mysql_error());
  
					    $t="select max(regid) from reg";
					    $tee=mysql_query($t,$con);
 $te = mysql_fetch_array($tee);
 
					  $g="select percentage from reg where regid='$te[0]'";
					   $gee=mysql_query($g,$con);
 $ge = mysql_fetch_array($gee);$m=1;
 if($ge[0]<$min_percentage || $_POST['dt']<1 || $_POST['dt']>31 || $_POST['mh']<1 || $_POST['mh']>12 || strlen($_POST['phone_no'])<10)
 {
	$g="delete from reg where regid='$te[0]'"; $r="delete from images where password='$te[0]'";
	$gee=mysql_query($g,$con);$ree=mysql_query($r,$con);
	 $MM_Failed = "registrationfaifordetailsl.php";
	 if (isset($_SERVER['QUERY_STRING'])) {
    $MM_Failed .= (strpos($MM_Failed, '?')) ? "&" : "?";
    $MM_Failed .= $_SERVER['QUERY_STRING'];$m=0;
  }
  header(sprintf("Location: %s", $MM_Failed));
}
 $t="select max(regid) from reg";
					    $tee=mysql_query($t,$con);
 $te = mysql_fetch_array($tee);
 $w="select ifnull(max(password),0) from images";

 $wee=mysql_query($w,$con);
 $we = mysql_fetch_array($wee);
 
if($te[0]!=$we[0])
 {
 $g="delete from reg where regid='$te[0]'";
	$gee=mysql_query($g,$con);
	 $MM_redirectLoginFailed = "registrationfail.php";$m=0;
	 if (isset($_SERVER['QUERY_STRING'])) {
    $MM_redirectLoginFailed .= (strpos($MM_redirectLoginFailed, '?')) ? "&" : "?";
    $MM_redirectLoginFailed .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $MM_redirectLoginFailed));
 }
if($m==1)
{
  $insertGoTo = "acknowledge.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  }
}

mysql_select_db($database_form, $form);
$query_Recordset1 = "SELECT (ifnull(max(regid),0)+1) as regi FROM reg";
$Recordset1 = mysql_query($query_Recordset1, $form) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="shortcut icon" href="logo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: xx-large;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
.style2 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 18px; }
.style3 {font-size: 24px}
.style4 {font-size: 18px}
.style5 {font-size: xx-large}
body {
	background-image: url(red-light-glow-background.jpg);
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>


<p class="style1">REGISTRATION DETAILS:</p> 
      <form method="post" enctype="multipart/form-data">
        <p align="left"><br/>
          <input type="file" name="image"> 
          <input type="submit" name="submit" value="upload" />
          <?php
    if(isset($_POST['submit']))
    {
     if(@getimagesize($_FILES['image']['tmp_name'])==FALSE)
    {
       echo "please select an image"; 
    }
   else
  {
   $image=addslashes($_FILES['image']['tmp_name']);
   $name=addslashes($_FILES['image']['name']);
   $image=file_get_contents($image);
   $image=base64_encode($image);
   saveimage($name,$image);
  }
 }
 
function saveimage($name,$image)
{
 $con=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$con);
 $t="select max(regid) from reg";
 $w="select max(password) from images";
 $tee=mysql_query($t,$con);
 $te = mysql_fetch_array($tee);
 $wee=mysql_query($w,$con);
 $we = mysql_fetch_array($wee);
 if($te[0]!=$we[0])
 {
 $g="delete from images where password='$we[0]'";
	$gee=mysql_query($g,$con);
 }
 
 $r="select ifnull(max(regid),0)+1 from reg";
 $re=mysql_query($r,$con);
 $p = mysql_fetch_array($re);
 $qry="insert into images (password,name,image) values ('$p[0]','$name','$image')";
 $result=mysql_query($qry,$con);displayimage();
if($result)
{
 echo "<br/>Image uploaded";
}
else
{
 echo "<br/>Image not uploaded.";
}
}


function displayimage()
{
 $con=@mysql_connect("localhost","root","");
 mysql_select_db("wissen_enrollment",$con);
 $qry="select * from images";
 $q="select max(password) from images";
 $result=mysql_query($qry,$con);
 $res=mysql_query($q,$con);
 $r = mysql_fetch_array($res);
 while($row = mysql_fetch_array($result))
 {
    
	if($row[0]==$r[0])
	{
       echo '<img height="80" width="120" src="data:image;base64,'.$row[2].' "> ';
    }
 }
 mysql_close($con);
}
?>
        *</p>
</form>
      <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('first_name','','R','surname','','R','DOB','','R','specialization','','R','year','','RisNum','percentage','','RisNum','college','','R','email_id','','RisEmail','phone_no','','RisNum');return document.MM_returnValue">
	  <table width="526" height="135" border="0"> 
  <tr>
	  <td width="520" height="129"><span class="style3">Registration Number : 
        
      <?php echo $row_Recordset1['regi']; ?></span> 
	  
	  
	  
	  
	  </td>
    </tr>   
  </table>
  <table width="755" height="576" border="0">
    <tr>
      <td width="301"><span class="style4">First Name </span></td>
      <td width="444">:
      <input name="first_name" type="text" id="first_name" size="40" /></td>
    </tr>
    <tr>
      <td><span class="style4">Last Name (Surname) </span></td>
      <td>:
        <input name="surname" type="text" id="surname" size="40"/></td>
    </tr>
	<tr>
      <td height="40"><span class="style4">D.O.B </span></td>
      <td>:      
        <input name="yr" type="text" id="yr" value="yyyy" size="2" />
      -
      <input name="mh" type="text" id="mh" value="mm" size="1" />
      -
      <input name="dt" type="text" id="dt" value="dd" size="1" /></td>
    </tr>
	<tr>
      <td height="40"><span class="style4">Gender </span></td>
      <td>:<label>
            <input type="radio" name="gender" value="MALE" />
            Male</label> 
        <label>
            <input type="radio" name="gender" value="FEMALE" />
            Female</label>
          <br />
      </td>
    </tr>
    <tr>
      <td><p class="style4">Highest Educational Qualification </p>
          <p class="style4">(Mention the area of Specialization) </p></td>
      <td>:
        <input name="specialization" type="text" id="specialization" size="40" /></td>
    </tr>
    <tr>
      <td width="301" height="80"><span class="style4">Educational Stream </span></td>
      <td width="444">:
        <select name="stream" size="1" id="stream">
            <option selected="selected">CSE</option>
            <option>IT</option>
            <option>ECE</option>
            <option>MBA</option>
            <option>NONE</option>
      </select>      </td>
    </tr>
    <tr>
      <td><span class="style4">Year of Passing </span></td>
      <td>:
        <input name="year" type="text" id="year" size="40" /> 
      </td>
    </tr>
    <tr>
      <td><span class="style4">Percentage of Marks </span></td>
      <td>:
        <input name="percentage" type="text" id="percentage" size="40" /></td>
    </tr>
    <tr>
      <td><span class="style4">College &amp; University</span> </td>
      <td>:
        <input name="college" type="text" id="college" size="40" /></td>
    </tr>
    <tr>
      <td height="40"><span class="style4">Email ID </span></td>
      <td>:
        <input name="email_id" type="text" id="email_id" size="40" /></td>
    </tr>
    <tr>
      <td><span class="style4">Phone Number </span></td>
      <td>:
        <input name="phone_no" type="text" id="phone_no" size="45" /></td>
    </tr>
    <tr> </tr>
    <tr>
      <td><span class="style4">Mode of Entry </span></td>
      <td>:
        <select name="mode" id="mode">
            <option>WALK-IN</option>
            <option>REFERENCE</option>
            <option>PUBLICITY</option>
        </select>      </td>
    </tr>
    <tr>
      <td><span class="style4">References / Contact At Wissen </span></td>
      <td>:
        <select name="ref" id="ref">
            <option selected="selected">NULL</option>
            <option>ASHOK K THATIPALLY</option>
            <option>SUBHAKAR REDDY KURLY</option>
            <option>MADHAV VIJJALI</option>
            <option>REDDY S EARASI</option>
        </select>      </td>
    </tr>
    <tr>
      <td height="95"><span class="style4">Additional Certifications / Experience </span></td>
      <td>:
        <textarea name="extra_quali" cols="40" id="extra_quali"></textarea></td>
    </tr>
  </table>
  <table width="664" height="54" border="0">
    
  </table>
  <p>&nbsp;</p>
  <p>
    <input name="Submit" type="submit" class="style3" value="Submit" onclick="allLetter(document.form1.first_name,document.form1.surname,document.form1.phone_no,document.form1.mh,document.form1.dt)"/>
  </p>
  <p class="style2 style5"><a href="acknowledge.php"></p>
  
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p class="style2 style5"></p>
</p>
<script src="all-letters.js"></script>
<script>
function allLetter(inputtxt1,im,im1,mh1,dt1){
var letters=/^[A-Za-z]+$/; var phone=/^[0-9]{10,10}$/;
if(inputtxt1.value.match(letters) && im.value.match(letters))
{

if(im1.value.match(phone) || (mh1.value>0 && mh1.value<13) || (dt1.value>0 && mh1.value<32))
{
return true;
}
else
{
alert("Not a valid phone number");
if(mh1.value<1 || mh1.value>12 || dt1.value<1 || dt1.value>31)
{
alert("Invalid date");
return false;
}
return false;
}
}
else
{
alert("Please input alphabets only");

if(im1.value.match(phone))
{
return false;
}
else
{
alert("Not a valid phone number");
if(mh1.value<1 || mh1.value>12 || dt1.value<1 || dt1.value>31)
{
alert("Invalid date");
}
return false;
}
}

}
</script> 
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>