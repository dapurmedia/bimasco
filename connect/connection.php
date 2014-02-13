<?php

<<<<<<< HEAD
$server = '192.168.1.10';
=======
$server = 'localhost';
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
$name_server = 'root';
$password_server = 'root';
$dbname = 'bimasco_new';

mysql_connect("$server", "$name_server", "$password_server") or die("Connection Failed");
mysql_select_db("$dbname") or die("Cannot find database");
?>