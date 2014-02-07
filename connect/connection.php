<?php

$server = 'localhost';
$name_server = 'root';
$password_server = 'root';
$dbname = 'bimasco_new';

mysql_connect("$server", "$name_server", "$password_server") or die("Connection Failed");
mysql_select_db("$dbname") or die("Cannot find database");
?>