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

                        if (form.titlePho.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.titlePho.focus();
                            return (false);
                        }
                        if (form.placePho.value.trim() === "") {
                            alert("Please enter Place.");
                            form.placePho.focus();
                            return (false);
                        }
                        if (form.descriptionPho.value.trim() === "") {
                            alert("Please enter Description Photo.");
                            form.descriptionPho.focus();
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
                <div class="container">
                    <!-- Header -->        
                    <?php include_once './header.php'; ?>        
                    <!-- End Header -->

                    <!-- Content -->  
                    <div class="row-fluid">
                        <div class="span12">
                            <form name="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validasi(this);">
                                <legend>Add New Photo</legend>
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="title">Title</label>
                                        <div class="controls">
                                            <input type="hidden" name="idAlbum" value="<?php echo $_GET['id']; ?>">
                                            <input type="hidden" name="titleAlbum" value="<?php echo $_GET['title']; ?>">
                                            <input type="text" placeholder="Title..." class="input-xlarge" maxlength="15" name="titlePho" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="place">Place</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Place" class="input-large" maxlength="25" name="placePho" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="description">Description</label>
                                        <div class="controls">
                                            <textarea rows="5" class="span4" name="descriptionPho" maxlength="150" required></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fupload">Picture</label>
                                        <div class="controls">
                                            <input type="file" name="fupload" accept="image/*" runat="server" id="fupload" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="savePhoto" data-loading-text="Loading..." class="btn btn-success">Save</button>
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
                    <!-- end left -->
                </div>
            </body>
        </html>
        <?php
        if (isset($_POST['savePhoto'])) {
            $idAlbum = $_POST['idAlbum'];
            $titleAlbum = $_POST['titleAlbum'];
            $titlePho = $_POST['titlePho'];
            $placePho = $_POST['placePho'];
            $descriptionPho = $_POST['descriptionPho'];
            $namePho = $_FILES['fupload']['name'];
            $location = $_FILES['fupload']['tmp_name'];
            $path = "uploads/images/" . $_FILES['fupload']['name'];
            $today = date("Y-m-d");

            // check duplicate galery photo
            $sql = mysql_query("SELECT * FROM galery");
            $data = mysql_num_rows($sql);
            $stop = 0;
            $i = 0;

            while ($i < $data) {
                $rows = mysql_fetch_array($sql);
                $galTitle = $rows['title_photo'];
                $data;
                $galTitle . ":";
                $i++;
                if ($titlePho != "") {
                    if ($titlePho == $galTitle) {
                        $stop = 1;
                        break;
                    }
                }
            }

            if ($stop == 1) {
                echo "<script>alert('Title photo already exist, use another title')</script>";
            } else {
                if (!empty($location)) {
                    if ((($_FILES["fupload"] ["type"] == "image/gif") || ($_FILES["fupload"] ["type"] == "image/jpeg") ||
                            ( $_FILES ["fupload"]["type"] == "image/jpg" ) || ($_FILES["fupload"] ["type"] == "image/png")) && ( $_FILES["fupload"]["size"] < 3000000)) {

                        if (move_uploaded_file($_FILES['fupload']['tmp_name'], $path)) {
                            mysql_query("INSERT INTO galery SET id_album = '$idAlbum', title_photo = '$titlePho', date_photo = '$today', 
                                    date_update_photo = '$today', place_photo = '$placePho', description_photo = '$descriptionPho', 
                                        photo = '$namePho', written_photo='$_SESSION[username]'");
                            mysql_query("UPDATE album set date_album_update = '$today', written='$_SESSION[username]' WHERE id_album = '$_GET[id]'");
                            echo "<script>alert('New picture has been saved')</script>";
                            echo "<script>javascript:window.location='photos.php?title=$titleAlbum&id=$idAlbum'</script>";
                        } else {
                            echo "<script>alert('Failed to upload !!! Type file must: gif, jpg and png. Size 300kb')</script>";
                        }
                    }
                }
            }
        }
    }
}
?>