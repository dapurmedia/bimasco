<?php
session_start();
include '../connect/connection.php';
mysql_query("DELETE FROM album WHERE id_album ='$_GET[id]' AND title_album='$_GET[title]'");
mysql_query("DELETE FROM galery WHERE id_album ='$_GET[id]'");
echo "<script>alert('Album has been deleted');</script>";
echo "<script>javascript:window.location='./galeri.php';</script>";
?>
