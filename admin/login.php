<?php

session_start();
//koneksi ke database]
include '../connect/connection.php';
if (isset($_POST['var_usn']) AND isset($_POST['var_pwd'])) {
    $user = addslashes($_POST['var_usn']);
    $pass = addslashes($_POST['var_pwd']);
    $check = mysql_query('select * from users where username="' . $user . '" AND password="' . $pass . '" ');
    if (mysql_num_rows($check) == 0) {
        echo 'Username atau Password Salah !';
    } else {
        $_SESSION['login']['username'] = $user;
        $_SESSION['login']['password'] = $pass;
        echo 'ok';
    }
}
?>
