<?php
session_start();
include '../connect/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sign in &middot; Administrator - Bimasco Cargo System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <body>
        <div id="wrap">

            <!-- Fixed navbar -->
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Administrator Page - Bimasco Cargo System</a>
                    </div>
                </div>
            </div>

            <div class="container">
                <form class="form-signin" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="signin" value="Sign in">
                </form>
            </div>
        </div>

        <?php include './footer.php'; ?>
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
if (isset($_POST['signin'])) {
    $user = mysql_real_escape_string($_POST['user']);
    $pass = md5($_POST['pass']);
    $today = date("j F Y , g:i a");

    $sql = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
    $data = mysql_fetch_array($sql);

    if (mysql_num_rows($sql) == 1) {

        //session_register($data['username'], $data['password']);
        $_SESSION['username'] = htmlspecialchars($data['username']);
        $_SESSION['password'] = $data['password'];
        $_SESSION['id_users'] = $data['id_users'];

        $insert_lastlogin = "UPDATE users SET last_login = '$today' WHERE username = '$user'";
        mysql_query($insert_lastlogin);
        echo "<script>alert('Welcome $user')</script>";
        echo "<script>javascript:window.location='./home.php'</script>";
    } else {
        // tampilkan error
        echo "<script>alert('Username or password failed')</script>";
    }
}
?>