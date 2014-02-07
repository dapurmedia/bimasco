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
                    $(function() {
                        $('#element').tooltip('show');
                    });

                    function validasi(form) {
                        valid = true;
                        prefixUsername = /^[A-Za-z0-9!`~@#$%^&*()-=_+;':"<>?,.{}| ]{2,10}$/;
                        prefixPassword = /^[A-Za-z0-9`~@#$%^&*()-=_+;':"<>?,.{}| ]{3,20}$/;
                        prefixEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        var t = document.getElementById('email');
                        var x = t.value.indexOf('@');
                        var y = t.value.lastIndexOf('.');

                        if (form.username.value.trim() === "") {
                            alert("Please enter a Username.");
                            form.username.focus();
                            return (false);
                        }
                        if (form.password.value.trim() === "") {
                            alert("Please enter Password.");
                            form.password.focus();
                            return (false);
                        }
                        if (form.password.value.length < 6) {
                            alert("Fill in the Password with a number from 0-9 between 6-32 characters");
                            form.password.focus();
                            return (false);
                        }
                        if (form.status.value === "") {
                            alert("Choose one status");
                            form.status.focus();
                            return (false);
                        }
                        return valid;
                    }
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
                        $editUser = mysql_query("SELECT * FROM users WHERE id_users = '$_GET[id]'");
                        $dataUser = mysql_fetch_array($editUser);
                        if ($dataUser['status'] == 'Administrator') {
                            $checked = 'selected';
                        } elseif ($dataUser['role'] == 'User') {
                            $checkeds = 'selected';
                        }
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" id="form" class="form-horizontal" onSubmit="return validasi(this);">
                            <legend>Edit New User</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_users" value="<?php echo $dataUser['id_users']; ?>">
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><strong><?php echo $dataUser['username']; ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required value="<?php echo $dataUser['password']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" placeholder="your.email@domain.com" class="form-control" id="inputPassword3" name="email" value="<?php echo $dataUser['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="status" required>
                                            <option value="">-Choose-</option>
                                            <option value="Administrator" <?php echo $checked; ?>>Administrator</option>
                                            <option value="User" <?php echo $checkeds; ?>>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="update" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './manage-user.php';" class="btn btn-default">
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
        if (isset($_POST['update'])) {
            $id_user = $_POST['id_users'];
            $pswd = md5($_POST['password']);
            $email = trim($_POST['email']);
            $status = $_POST['status'];

            if ($status === 'Administrator') {
                $sql = mysql_query("UPDATE users SET password='$pswd', email='$email',
                status='$status' WHERE id_users = '$id_user'");
            } elseif ($status === 'User') {
                $sql = mysql_query("UPDATE users SET password='$pswd', email='$email',
                status='$status' WHERE id_users = '$id_user'");
            }if ($sql) {
                echo "<script>alert('Data user has been updated');</script>";
                echo "<script>javascript:window.location='./manage-user.php'</script>";
            } else {
                echo "<script>alert('Data user cannot updated');</script>";
            }
        }
    }
}
?>