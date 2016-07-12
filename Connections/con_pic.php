<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_pic = "localhost";
$database_con_pic = "a_pic";
$username_con_pic = "root";
$password_con_pic = "";
$con_pic = mysql_pconnect($hostname_con_pic, $username_con_pic, $password_con_pic) or trigger_error(mysql_error(),E_USER_ERROR); 
?>