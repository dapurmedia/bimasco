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
                        <?php
                        $querySosmed = mysql_query("SELECT * FROM sosmed WHERE id_sosmed = '$_GET[id]'");
                        $dataSosmed = mysql_fetch_array($querySosmed);
                        ?>
                        <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validasi(this);">
                            <legend>Edit Social Media</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_sosmed" class="form-control" id="inputEmail3" required value="<?php echo $dataSosmed['id_sosmed']; ?>">
                                        <input type="type" name="id" class="form-control" id="inputEmail3" placeholder="id" required value="<?php echo $dataSosmed['ID']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Sosmed</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static"><strong><?php echo $dataSosmed['name_sosmed']; ?></strong></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Change Sosmed</label>
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
                                        <button name="updateSosmed" type="submit" class="btn btn-success">Save</button>
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
        if (isset($_POST['updateSosmed'])) {
            $id_sosmed = $_POST['id_sosmed'];
            $sosmed = $_POST['sosmed'];
            $id = trim($_POST['id']);

            if ($sosmed == 0) {
                $sql = mysql_query("UPDATE sosmed SET ID='$id' WHERE id_sosmed = '$id_sosmed'");
                if ($sql) {
                    echo "<script>alert('Data social media has been updated');</script>";
                    echo "<script>javascript:window.location='./sosmed.php'</script>";
                } else {
                    echo "<script>alert('Data social cannot updated');</script>";
                }
            } else if ($sosmed > 0) {
                $sql2 = mysql_query("UPDATE sosmed SET ID='$id', name_sosmed='$sosmed' WHERE id_sosmed = '$id_sosmed'");
                if ($sql2) {
                    echo "<script>alert('Data social media has been updated');</script>";
                    echo "<script>javascript:window.location='./sosmed.php'</script>";
                } else {
                    echo "<script>alert('Data social cannot updated');</script>";
                }
            }
        }
    }
}
?>