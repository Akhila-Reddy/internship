<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_form = "localhost";
$database_form = "wissen_enrollment";
$username_form = "root";
$password_form = "";
$form = mysql_pconnect($hostname_form, $username_form, $password_form) or trigger_error(mysql_error(),E_USER_ERROR); 
?>