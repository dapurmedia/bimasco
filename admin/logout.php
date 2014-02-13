<?php

session_start();
session_destroy();
echo "<script>alert('You are logout.'); parent.location='./index.php';</script>\n";
?>
