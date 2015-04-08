<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Connection_biblioteca = "localhost";
$database_Connection_biblioteca = "biblioteca_db";
$username_Connection_biblioteca = "root";
$password_Connection_biblioteca = "";
$Connection_biblioteca= mysql_pconnect($hostname_Connection_biblioteca, $username_Connection_biblioteca,
 $password_Connection_biblioteca) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
