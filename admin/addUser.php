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
                <script type="text/javascript" src="bootstrap/js/jquery_notification_v.1.js"></script>
                <script type="text/javascript" src="bootstrap/js/jquery_v_1.4.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        load(1);
                        $('#element').tooltip('show');
                    });
                    $('#loading-example-btn').click(function() {
                        var btn = $(this);
                        btn.button('loading');
                    });
                    
                    function validasi(form) {
                        valid = true;
                        var t = document.getElementById('email');
                        var x = t.value.indexOf('@');
                        var y = t.value.lastIndexOf('.');
                        if (form.username.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.username.focus();
                            return (false);
                        }
                        if (form.password.value.trim() === "") {
                            alert("Please enter Place.");
                            form.password.focus();
                            return (false);
                        }
                        if (form.password.value.length < 6) {
                            alert("Fill in the Password with a number from 0-9 between 6-32 characters");
                            form.password.focus();
                            return (false);
                        }
                        if (x === -1 || y === -1 || (x + 2) >= y) {
                            alert('Email address is not valid');
                            form.email.focus();
                            return (false);
                        }
                        if (form.email.value === "") {
                            alert("Please enter Date.");
                            form.email.focus();
                            return (false);
                        }
                        if (form.status.value.trim() === "") {
                            alert("Please enter Description.");
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
                        <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validasi(this);">
                            <legend>Add New User</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-3">
                                        <input type="type" name="username" class="form-control" id="inputEmail3" placeholder="Username" required value="<?php echo $_POST['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required value="<?php echo $_POST['password'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="your.email@domain.com" required value="<?php echo $_POST['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="status" required>
                                            <?php
                                            if ($_POST['status'] === 'Administrator') {
                                                $check = "checked";
                                            } elseif ($_POST['status'] === 'User') {
                                                $checks = "checked";
                                            }
                                            ?>
                                            <option name="0">- Choose -</option>
                                            <option name="Administrator" <?php $check ?>>Administrator</option>
                                            <option name="User" <?php $checks ?>>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button name="saveUser" type="submit" class="btn btn-success" id="loading-example-btn" data-loading-text="Loading...">Save</button>
                                        <input type="button" onClick="document.location = 'manage-user.php';" class="btn btn-default" value="Cancel">
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
        if (isset($_POST['saveUser'])) {
            $username = trim($_POST['username']);
            $password = trim(md5($_POST['password']));
            $email = trim($_POST['email']);
            $status = trim($_POST['status']);

// check duplicate username
            $sql = mysql_query("SELECT * FROM users");
            $data = mysql_num_rows($sql);
            $stop = 0;
            $i = 0;

            while ($i < $data) {
                $rows = mysql_fetch_array($sql);
                $myUser = $rows['username'];
                $myStatus = $rows['status'];
                $data;
                $myUser . ":";
                $i++;
                if ($username != "") {
                    if ($username === $myUser) {
                        $stop = 1;
                        break;
                    }
                } elseif ($password != "") {
                    if ($status === $myStatus) {
                        $stop = 1;
                        break;
                    }
                }
            }

            if ($stop == 1) {
                echo "<script>alert('Username $username already exist, use another username')</script>";
            } else {
                if ($status == 'Administrator') {
                    $sql = mysql_query("INSERT INTO users SET username = '$username', password='$password', 
                        email ='$email',  status='Administrator'");
                } elseif ($status == 'User') {
                    $sql = mysql_query("INSERT INTO users SET username = '$username', password='$password',
                        email ='$email',  status='User'");
                }
                if ($sql) {
                    echo "<script>alert('New user has been saved');</script>";
                    echo "<script>javascript:window.location='./manage-user.php'</script>";
                } else if ($sql) {
                    echo "<script>alert('New user cannot be saved');</script>";
                }
            }
        }
    }
}
?>