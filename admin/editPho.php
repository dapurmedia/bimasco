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
                        
                        form.title_Pho.value = form.title_Pho.value.trim();
                        form.place_Pho.value = form.place_Pho.value.trim();
                        form.description_Pho.value = form.description_Pho.value.trim();

                        if (form.title_Pho.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.title_Pho.focus();
                            return (false);
                        }
                        if (form.place_Pho.value.trim() === "") {
                            alert("Please enter Place.");
                            form.place_Pho.focus();
                            return (false);
                        }
                        if (form.description_Pho.value.trim() === "") {
                            alert("Please enter Description Photo.");
                            form.description_Pho.focus();
                            return (false);
                        }
                        var inputFile = document.getElementById('fupload');

                        for (var i = 0; i < inputFile.files.length; i++)
                        {
                            var file = inputFile.files[i];
                            if ('size' in file)
                            {
                                var sz = file.size / (1024 * 1024);
                                //RESTRICTING UPLOAD FILE SIZE TO 2MB
                                if (sz >= 2)
                                {
                                    alert('File upload cannot more size 300kb');
                                    return false;
                                }
                            }
                        }//for

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
                            $query = mysql_query("SELECT * FROM galery WHERE id_galery = '$_GET[idPhoto]'");
                            $editPho = mysql_fetch_array($query);
                            ?>
                            <form action="editPho.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET[id]; ?>&idPhoto=<?php echo $_GET[idPhoto]; ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validasi(this);">
                                <legend>Edit Photo</legend>
                                <fieldset>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id_Photo" value="<?php echo $_GET[idPhoto]; ?>">
                                            <input type="text" placeholder="Title..." class="form-control" maxlength="15" name="title_Pho" value="<?php echo $editPho['title_photo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="date_Pho" value="<?php echo $editPho['date_photo']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Place</label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Place" class="form-control" maxlength="25" name="place_Pho" value="<?php echo $editPho['place_photo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                       <div class="col-sm-3">
                                            <textarea rows="5" class="form-control" name="description_Pho" required maxlength="150"><?php echo $editPho['description_photo']; ?></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Picture</label>
                                        <div class="col-sm-3">
                                            <img src="uploads/images/<?php echo $editPho['photo']; ?>" width="200" height="150">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label">Change Picture</label>
                                        <div class="col-sm-3">
                                            <input type="file" name="fupload" accept="image/*" runat="server" id="fupload">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                       <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updatePhoto" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                            <input type="button" value="Cancel" onclick="document.location = 'photos.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn">
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
        if (isset($_POST['updatePhoto'])) {
            $getTitle = $_GET['title'];
            $getId = $_GET['id'];
            $idPhoto = $_POST['id_Photo'];
            $titlePho = trim($_POST['title_Pho']);
            $placePho = trim($_POST['place_Pho']);
            $descriptionPho = trim($_POST['description_Pho']);
            $namePho = $_FILES['fupload']['name'];
            $location = $_FILES['fupload']['tmp_name'];
            $path = "uploads/images/" . $_FILES['fupload']['name'];
            $today = date("Y-m-d");

            if (!empty($location)) {
                if ((($_FILES["fupload"] ["type"] == "image/gif") || ($_FILES["fupload"] ["type"] == "image/jpeg") ||
                        ( $_FILES ["fupload"]["type"] == "image/jpg" ) || ($_FILES["fupload"] ["type"] == "image/png")) && ( $_FILES["fupload"]["size"] < 2000000)) {

                    if (move_uploaded_file($_FILES['fupload']['tmp_name'], $path)) {
                        mysql_query("UPDATE galery SET title_photo = '$titlePho', date_update_photo = '$today', 
                                    place_photo = '$placePho', description_photo = '$descriptionPho', photo = '$namePho', 
                                        contribution_photo='$_SESSION[username]' WHERE id_galery ='$idPhoto'");
                        mysql_query("UPDATE album set date_album_update = '$today', written='$_SESSION[username]' WHERE id_album = '$getId'");
                        echo "<script>alert('Picture has been updated')</script>";
                        echo "<script>javascript:window.location='photos.php?title=$getTitle&id=$getId';</script>";
                    } else {
                        echo "<script>alert('Failed to upload !!! Type file must: gif, jpg and png. Size 300kb')</script>";
                    }
                }
            } elseif (empty($location)) {
                mysql_query("UPDATE galery SET title_photo = '$titlePho', date_update_photo = '$today', 
                            place_photo = '$placePho', description_photo = '$descriptionPho', 
                                contribution_photo='$_SESSION[username]' WHERE id_galery = '$idPhoto'");
                mysql_query("UPDATE album set date_album_update = '$today', written='$_SESSION[username]' WHERE id_album = '$getId'");
                echo "<script>alert('Picture has been updated')</script>";
                echo "<script>javascript:window.location='photos.php?title=$getTitle&id=$getId';</script>";
            } else {
                echo "<script>alert('Failed to upload !!! Type file must: gif, jpg and png. Size 300kb')</script>";
            }
        }
    }
}
?>