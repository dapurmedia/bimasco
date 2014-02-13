<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Administrator - Bimasco Cargo System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">

                <!-- Le styles -->
                <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
                <link href="bootstrap/css/style.css" rel="stylesheet">
                <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<<<<<<< HEAD
                <script type="text/javascript">
                    $(function() {
                        load(1);
                        $(".dropdown-toggle").dropdown();
=======
                <script>
                    $(document).ready(function() {
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                        $('#element').tooltip('show');
                    });
                </script>
            <body>
                <div id="wrap">

                    <!-- Fixed navbar -->
                    <?php include './header.php'; ?>

                    <!-- Begin page content -->
                    <div class="container">
                        <div class="page-header">
                            <h1>Welcome to Administrator Page - Bimasco Cargo System</h1>
                        </div>

                        <p class="lead">To manage website content, please click the menu options above.</p>
                        <center>
                            <div class="css3gallery">
                                <a href="manage-user.php" id="element" data-toggle="tooltip" title="Manage User" class="span2">
                                    <img src="bootstrap/img/user-login-icon.png" alt="..." class="img-thumbnail img-circle img-rounded">
                                </a>
<<<<<<< HEAD
                                <a href="beranda.php" id="element" data-toggle="tooltip" title="Manage Home">
                                    <img src="bootstrap/img/green-home-icon.png" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <a href="sosmed.php" id="element" data-toggle="tooltip" title="Manage Social Media">
                                    <img src="bootstrap/img/free-icons-round-up-75.jpg" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <a href="guest.php" id="element" data-toggle="tooltip" title="Message From Guest">
                                    <img src="bootstrap/img/email-.png" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <a href="http://www.bimasco.com/webmail" id="element" data-toggle="tooltip" title="Webmail" target="_blank">
                                    <img src="bootstrap/img/webmail.jpg" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>


                                <a href="setting.php" id="element" data-toggle="tooltip" title="Setting">
                                    <img src="bootstrap/img/settings.png" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <div id="kepala">
                                    <span id="notifikasi"></span>
                                </div>

=======
                                <a href="sosmed.php" id="element" data-toggle="tooltip" title="Manage Social Media">
                                    <img src="bootstrap/img/free-icons-round-up-75.jpg" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <a href="setting.php" id="element" data-toggle="tooltip" title="Setting">
                                    <img src="bootstrap/img/settings.png" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <a href="guest.php" id="element" data-toggle="tooltip" title="Message From Guest">
                                    <img src="bootstrap/img/email-.png" alt="..." class="img-thumbnail img-circle img-rounded span2">
                                </a>
                                <div id="kepala">
                                    <span id="notifikasi"></span>
                                </div>
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                            </div>
                        </center>
                    </div>
                </div>
                <?php include './footer.php'; ?>


                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
<<<<<<< HEAD
                <script src="bootstrap/js/jquery-1.7.1.js"></script>
                <script src="bootstrap/js/bootstrap-dropdown.js"></script>
                <script src="bootstrap/js/notif.js"></script>
=======
                <script src="../js/jquery-1.7.1.js"></script>
                <script src="../js/notif.js"></script>
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
            </body>
        </html>
        <?php
    }
}
?>
