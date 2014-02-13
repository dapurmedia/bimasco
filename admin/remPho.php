<?php

session_start();
include '../connect/connection.php';
mysql_query("DELETE FROM galery WHERE id_galery ='$_GET[idPhoto]'");
echo "<script>alert('Picture has been deleted');</script>";
echo "<script>javascript:window.location='./photos.php?title=$_GET[title]&id=$_GET[id]&idPhoto=$_GET[idPhoto]';</script>";
?>
