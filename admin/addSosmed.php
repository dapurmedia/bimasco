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
                    $(document).ready(function() {
                        load(1);
                        $('#element').tooltip('show');
                    });

                    function validasi(form) {
                        valid = true;

                        if (form.id.value.trim() === "") {
                            alert("Please enter a ID.");
                            form.id.focus();
                            return (false);
                        }
                        if (form.sosmed.value.trim() === "") {
                            alert("Please choose Sosial Media.");
                            form.sosmed.focus();
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
                            <legend>Add New Social Media</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                                    <div class="col-sm-3">
                                        <input type="type" name="id" class="form-control" id="inputEmail3" placeholder="id" required value="<?php echo $_POST['id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="sosmed" required>
                                            <option name="0">- Choose -</option>
                                            <option name="facebook">Facebook</option>
                                            <option name="twitter">Twitter</option>
                                            <option name="gmail">Gmail</option>
                                            <option name="youtube">Youtube</option>
                                            <option value="ym">YM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button name="saveSosmed" type="submit" class="btn btn-success">Save</button>
                                        <input type="button" onClick="document.location = 'sosmed.php';" class="btn btn-default" value="Cancel">
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
        if (isset($_POST['saveSosmed'])) {
            $sosmed = $_POST['sosmed'];
            $id = trim($_POST['id']);

            // check duplicate username
            $sql = mysql_query("SELECT * FROM sosmed");
            $data = mysql_num_rows($sql);
            $stop = 0;
            $i = 0;

            while ($i < $data) {
                $rows = mysql_fetch_array($sql);
                $myID = $rows['id'];
                $mySosmed = $rows['sosmed'];
                $data;
                $myID . ":";
                $mySosmed . ":";
                $i++;
                if ($id != "") {
                    if ($id === $myID) {
                        $stop = 1;
                        break;
                    }
                }
                if ($sosmed != "") {
                    if ($sosmed === $mySosmed) {
                        $stop = 1;
                        break;
                    }
                }
            }

            if ($stop == 1) {
                echo "<script>alert('ID already exist, use another ID')</script>";
            } else {
                $sql = mysql_query("INSERT INTO sosmed SET ID = '$id', name_sosmed = '$sosmed'");
            }
            if ($sql) {
                echo "<script>alert('New social media has been saved');</script>";
                echo "<script>javascript:window.location='./sosmed.php'</script>";
            } else if ($sql) {
                echo "<script>alert('New social media cannot be saved');</script>";
            }
        }
    }
}
?>