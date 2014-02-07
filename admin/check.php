<?php

session_start();
include "../connect/connection.php";
$pesan = mysql_query("SELECT * FROM guest WHERE readed='N'");
$j = mysql_num_rows($pesan);
if ($j > 0) {
    echo $j;
}
?>