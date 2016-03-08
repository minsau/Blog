<?php
$host = "localhost";
$database = "bdBlog";
$username = "root";
$password = "uporeme13.,.";
$con = mysql_connect($host, $username, $password) or die ("ERROR de conexion");
$db_selected = mysql_select_db($database, $con) or die ("ERROR");
mysql_query("set names 'utf8' ");
?>
