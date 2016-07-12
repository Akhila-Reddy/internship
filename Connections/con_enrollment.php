<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_enrollment = "localhost";
$database_con_enrollment = "enrollment";
$username_con_enrollment = "root";
$password_con_enrollment = "";
$con_enrollment = mysql_pconnect($hostname_con_enrollment, $username_con_enrollment, $password_con_enrollment) or trigger_error(mysql_error(),E_USER_ERROR); 
?>