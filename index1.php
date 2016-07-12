<link rel="shortcut icon" href="logo.ico"/>
<html><style type="text/css">
<!--
body {
	background-image: url(wallpaper.jpg);
}
.style5 {font-size: 24px; color: #000000; font-family: Geneva, Arial, Helvetica, sans-serif; }
-->
</style>
<form action="" method="post">
<label><span class="style5">Name: </span><br>
<textarea name="name"></textarea>
<br>
</label>
<label><br>
<br>
<br>
<span class="style5">Please give your feedback </span><br>
<textarea cols="35" rows="5" name="mes"></textarea></label>
<p><br>
    <input name="post" type="submit" class="style5" value="Post ">
</p>
</form>
</html>


<?php
@$name = $_POST['name'];
@$text = $_POST['mes'];
@$post = $_POST['post'];

if($post){
#WRITE DOWN COMMENTS#

$write = fopen("com.txt","a+");
fwrite($write,"<u><b>$name</b></u>:<br>$text<br></br>");
fclose($write);
#DISPLAY COMMENTS#
$read = fopen("com.txt","r+t");
echo "All comments:<br>";
while(!feof($read)){
echo fread($read, 1024);
}
fclose($read);
}

?>
