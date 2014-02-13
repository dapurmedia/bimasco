<?php

session_start();
include '../connect/connection.php';
mysql_query("DELETE FROM galery WHERE id_galery ='$_GET[idVideo]'");
echo "<script>alert('Video has been deleted');</script>";
echo "<script>javascript:window.location='./videos.php?title=$_GET[title]&id=$_GET[id]&idVideo=$_GET[idVideo]';</script>";
?>
