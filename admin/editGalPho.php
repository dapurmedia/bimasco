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
                        <?php
                        $getIdAlbum = $_GET['id'];
                        $query = mysql_query("SELECT * FROM album WHERE id_album='$getIdAlbum' AND title_album='$_GET[title]'");
                        $editAlb = mysql_fetch_array($query);
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="form" class="form-horizontal" onsubmit="return validasi(this);">
                            <legend>Edit Album Photo</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Album Title</label>
                                     <div class="col-sm-3">
                                        <input type="hidden" name="id_album" value="<?php echo $editAlb['id_album']; ?>" >
                                        <input type="text" placeholder="Title..."  class="form-control"  maxlength="15" name="titleAlb" value="<?php echo $editAlb['title_album']; ?>" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Date Create</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="dateCre"  class="form-control" value="<?php echo $editAlb['date_album']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-3">
                                        <textarea rows="5"  class="form-control"  name="descriptionAlb" required maxlength="150"><?php echo $editAlb['description_album']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Type Album</label>
                                    <div class="col-sm-3">
                                        <?php
                                        if ($editAlb['type_album'] == 'Photo') {
                                            ?>
                                            <input name="photo"  class="form-control"  value="Photo" readonly>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="updateAlb" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './galeri.php';" class="btn">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- end content -->

                <!-- Footer -->
					<?php include_once './footer.php'; ?>
					<script src="../js/jquery-1.10.2.min.js"></script>
					<script src="bootstrap/js/bootstrap.min.js"></script>
					<!-- end left -->
            </div>
        </body>
        </html>

        <?php
        if (isset($_POST['updateAlb'])) {
            $id_album = $_POST['id_album'];
            $titleAlb = trim($_POST['titleAlb']);
            $descriptionAlb = trim($_POST['descriptionAlb']);
            $typeAlb = $_POST['photo'];
            $today = date("Y-m-d");

            $sql = mysql_query("UPDATE album SET title_album = '$titleAlb', date_album_update ='$today', 
                description_album = '$descriptionAlb', written='$_SESSION[username]', type_album='$typeAlb' WHERE id_album = '$id_album'");

            if ($sql) {
                echo "<script>alert('Album Photo has been updated');</script>";
                echo "<script>javascript:window.location='./galeri.php'</script>";
            } else {
                echo "<script>alert('Album Photo cannot be updated');</script>";
            }
        }
    }
}
?>