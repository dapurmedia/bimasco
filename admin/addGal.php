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
                        $(".dropdown-toggle").dropdown();
                        $('#element').tooltip('show');
                    });
                    function validasi(form) {
                        valid = true;

                        form.titleAlb.value = form.titleAlb.value.trim();
                        form.descriptionAlb.value = form.descriptionAlb.value.trim();

                        if (form.titleAlb.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.titleAlb.focus();
                            return (false);
                        }
                        if (form.descriptionAlb.value.trim() === "") {
                            alert("Please enter Description.");
                            form.descriptionAlb.focus();
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
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validasi(this);">
                            <legend>Add New Album</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Album Title</label>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="Title..." class="form-control" maxlength="15" name="titleAlb" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-3">
                                        <textarea rows="5" class="form-control" name="descriptionAlb" maxlength="150" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Type Album</label>
                                    <div class="col-sm-3">
                                        <input name="photo" class="form-control" value="Photo" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button name="savePhoto" type="submit" class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = 'galeri.php';" class="btn">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- end left -->

            </body>
        </html>

        <?php
        if (isset($_POST['savePhoto'])) {
            $titleAlb = $_POST['titleAlb'];
            $descriptionAlb = $_POST['descriptionAlb'];
//            $typeAlb = $_POST['photo'];
            $today = date("Y-m-d");

            // check duplicate album photo
            $sql = mysql_query("SELECT * FROM album");
            $data = mysql_num_rows($sql);
            $stop = 0;
            $i = 0;

            while ($i < $data) {
                $rows = mysql_fetch_array($sql);
                $albTitle = $rows['title_album'];
                $data;
                $albTitle . ":";
                $i++;
                if ($titleAlb != "") {
                    if ($titleAlb == $albTitle) {
                        $stop = 1;
                        break;
                    }
                }
            }

            if ($stop == 1) {
                echo "<script>alert('Title Album already exist, use another title')</script>";
            } else {
                $sql = mysql_query("INSERT INTO album SET title_album = '$titleAlb', date_album='$today', date_album_update='$today',
                description_album = '$descriptionAlb', written='$_SESSION[username]', type_album='Photo'");
                //echo $sql;

                if ($sql) {
                    echo "<script>alert('New Photo Album has been saved');</script>";
                    echo "<script>javascript:window.location='./galeri.php'</script>";
                } else {
                    echo "<script>alert('New Photo Album cannot be saved');</script>";
                }
            }
        }
    }
}
?>