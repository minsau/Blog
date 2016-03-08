<?php

$host = "localhost";
$database = "bdBlog";
$username = "root";
$password = "uporeme13.,.";

$con = mysql_connect($host, $username, $password);

$db_selected = mysql_select_db($database, $con);

?>