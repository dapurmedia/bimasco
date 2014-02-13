<?php
session_start();
include '../connect/connection.php';
include './date_function.php';
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
                <script src="../tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        $(".dropdown-toggle").dropdown();
                        $('#element').tooltip('show');
                    });
                    function validasi(form) {
                        valid = true;

                        form.titleVid.value = form.titleVid.value.trim();
                        form.placeVid.value = form.placeVid.value.trim();
                        form.descriptionVid.value = form.descriptionVid.value.trim();
                        form.website.value = form.website.value.trim();

                        if (form.titleVid.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.titleVid.focus();
                            return (false);
                        }
                        if (form.placeVid.value.trim() === "") {
                            alert("Please enter Place.");
                            form.placeVid.focus();
                            return (false);
                        }
                        if (form.descriptionVid.value.trim() === "") {
                            alert("Please enter Description Video.");
                            form.descriptionVid.focus();
                            return (false);
                        }
                        if (form.website.value.trim() === "") {
                            alert("Please enter Website.");
                            form.website.focus();
                            return (false);
                        }
                        var inputFile = document.getElementById('fupload');
                        var limit = 151000000;

                        for (var i = 0; i < inputFile.files.length; i++)
                        {
                            var file = inputFile.files[i];
                            if ('size' in file)
                            {
                                var sz = file.size / (151000000);
                                //RESTRICTING UPLOAD FILE SIZE TO 2MB
                                if (sz >= limit)
                                {
                                    alert('File upload cannot more size 2mb');
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
                            $query = mysql_query("SELECT * FROM galery WHERE id_galery='$_GET[idVideo]'");
                            $editVid = mysql_fetch_array($query);
                            ?>
                            <form action="editVid.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET[id]; ?>&idVideo=<?php echo $_GET[idVideo]; ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validasi(this);">
                                <legend>Edit Video</legend>
                                <fieldset>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="idVid" value="<?php echo $_GET['idVideo'] ?>">
                                            <input type="hidden" name="idVideo" value="<?php echo $_GET['id']; ?>">
                                            <input type="hidden" name="titleVideo" value="<?php echo $_GET['title']; ?>">
                                            <input type="text" placeholder="Title..."  class="form-control" maxlength="15" name="titleVid" value="<?php echo $editVid['title_video']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Place</label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Place" class="form-control" maxlength="25" name="placeVid" value="<?php echo $editVid['place_video']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-3">
                                            <textarea rows="5" class="form-control" name="descriptionVid" maxlength="150"><?php echo $editVid['description_video']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Video</label>
                                       <div class="col-sm-3">
                                            <input type="url" class="form-control" name="website" id="website" placeholder="eg. http://www.youtube.com/hB873hFIE " value="<?php echo $editVid['video']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="updateVid" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                            <input type="button" value="Cancel" onclick="document.location = 'videos.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn">
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
        if (isset($_POST['updateVid'])) {
            $idVid = $_POST['idVid'];
            $idVideo = $_POST['idVideo'];
            $titleVideo = $_POST['titleVideo'];
            $titleVid = trim($_POST['titleVid']);
            $placeVid = trim($_POST['placeVid']);
            $descVid = trim($_POST['descriptionVid']);
            $nameVid = trim($_POST['website']);
            $today = date("Y-m-d");

            if (!empty($idVideo)) {
                mysql_query("UPDATE galery SET id_album = '$idVideo', title_video = '$titleVid', date_update_video = '$today', video = '$nameVid',
            place_video = '$placeVid', description_video = '$descVid', contribution_video='$_SESSION[username]' WHERE id_galery='$idVid'");
                mysql_query("UPDATE album set date_album_update = '$today', written='$_SESSION[username]' WHERE id_album = '$_GET[id]'");
                echo "<script>alert('Video has been updated')</script>";
                echo "<script>javascript:window.location='videos.php?title=$titleVideo&id=$idVideo'</script>";
            } else {
                echo "<script>alert('Video cannot be updated')</script>";
            }
        }
    }
}
?>