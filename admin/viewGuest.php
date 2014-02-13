<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
        <!DOCTYPE>
        <html>
            <head>
                <title>Administrator - Bimasco Cargo System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">

                <!-- Le styles -->
                <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
                <link href="bootstrap/css/style.css" rel="stylesheet">
                <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
                <script type="text/javascript" src="bootstrap/js/jquery-1.7.2.min.js"></script>
                <script type="text/javascript">
                    function validasi(form) {
                        valid = true;

                        if (form.tentang.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.tentang.focus();
                            return (false);
                        }
                        if (form.content.value.trim() === "") {
                            alert("Please enter a Content.");
                            form.content.focus();
                            return (false);
                        }
                        return valid;
                    }
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        load(1);
                        $('#element').tooltip('show');
                    });
                </script>
            </head>
            <body>
                <div id="wrap">
                    <!-- Header -->        
                    <?php include './header.php'; ?>        
                    <!-- End Header -->

                    <!-- Content -->  
                    <div class="container">
                        <?php
                        $guest = mysql_query("SELECT * FROM guest WHERE id_guest = '$_GET[id]'");
                        $loopGuest = mysql_fetch_array($guest);
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validasi(this);">
                            <legend>Edit Content</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">From</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_guest" value="<?php echo $loopGuest['id_guest']; ?>">
                                        <input type="text" placeholder="name" class="form-control" id="inputPassword3" name="from" value="<?php echo $loopGuest['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-3">
                                        <input type="email" placeholder="email" class="form-control" id="inputPassword3" name="email" value="<?php echo $loopGuest['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="content" name="message" rows="5" required><?php echo $loopGuest['subject'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="guest" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './home.php';" class="btn btn-default">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end content -->
                </div>
                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- end left -->

            </body>
        </html>

        <?php
        if (isset($_POST['guest'])) {
            $id_guest = $_POST['id_guest'];
            $email = trim($_POST['email']);
            $message = trim(mysql_real_escape_string($_POST['message']));

            $sql = mysql_query("UPDATE guest SET email='$email', subject='$message', readed='Y' WHERE id_guest = '$id_guest'");

            if ($sql) {
                require './PHPMailer/class.phpmailer.php';
                $mail = new PHPMailer();

                $mail->IsSMTP();  // set mailer to use SMTP
                $mail->Host = "localhost";  // specify main and backup server
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->Username = "username@domain.com";  // SMTP username
                $mail->Password = "password"; // SMTP password

                $mail->From = "username@domain.com";
                $mail->FromName = "admin family";
                $mail->AddAddress($email);

                $mail->IsHTML(true); // set email format to HTML

                $mail->Subject = "Re: $email";
                $mail->Body = "$message ";

                if (!$mail->Send()) {
                    echo "<script>alert('Data content cannot updated');</script>";
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    exit;
                } else {
                    echo "<script>alert('Email new user has been sent');</script>";
                }
            } else {
                echo "<script>alert('Data content has been updated');</script>";
                echo "<script>javascript:window.location='./home.php'</script>";
            }
        }
    }
}
?>