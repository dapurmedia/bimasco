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
                <script type="text/javascript">
                    $(document).ready(function() {
                        load(1);
                        $(".dropdown-toggle").dropdown();
                        $('#element').tooltip('show');
                    });

                    function load(page) {
                        $("#loader").fadeIn('slow');
                        $.ajax({
                            url: 'galleryVid.php?action=ajax&page=' + page,
                            success: function(data) {
                                $(".outer_div").html(data).fadeIn('slow');
                                $("#loader").fadeOut('slow');
                            }
                        });
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
                        $dataPerPage = 4;
                        if (isset($_GET['page'])) {
                            $noPage = $_GET['page'];
                        }
                        else
                            $noPage = 1;
                        $offset = ($noPage - 1) * $dataPerPage;

                        if ($noPage == 1) {
                            $nom = ($noPage - 1) * $dataPerPage + 1;
                        } else {
                            $nom = ($noPage - 1) * $dataPerPage + 1;
                        }
                        $query = mysql_query("SELECT alb.*,(select count(vid.id_galery) from galery vid where vid.id_album = alb.id_album) AS total,
                            (select g.video from galery g where g.id_album = alb.id_album order by g.date_video DESC limit 0,1) as film 
                             FROM album AS alb where alb.type_album = 'Video' ORDER BY date_album_update DESC LIMIT $offset, $dataPerPage");

                        $noPage1 = mysql_num_rows($query);
                        // show data if empty
                        if ($noPage1 == 0) {
                            ?>
                            <div class="alert alert-warning">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new Gallery Video click the button below</p>
                                <p><button onClick="document.location = 'addGalAlbVid.php';" class="btn btn-primary" style="margin-bottom: 10px;"><i class="icon-plus-sign icon-white"></i> Add New Album Video</button></p>
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($noPage1 != 0) {
                            ?>
                            <button onClick="document.location = 'addGalAlbVid.php';" class="btn btn-group"><span class="glyphicon glyphicon-plus"></span> Add New Album Video</button>
                            <br/><br/>
                            <div class="row">
                                <?php
                                while ($dataGalleryVid = mysql_fetch_array($query)) {
                                    $date = dateAll($dataGalleryVid['date_album']);
                                    $dateUpdate = dateAll($dataGalleryVid['date_album_update']);
                                    ?>
                                    <div class="col-sm-3">
                                        <div class="thumbnail">
                                            <h3><?php echo $dataGalleryVid['title_album'] ?></h3>
                                            <?php if ($dataGalleryVid['film'] != NULL) { ?>
                                                <img src="./bootstrap/img/vt.jpg" width="300px" height="200px">
                                            <?php } if ($dataGalleryVid['film'] == NULL) { ?>
                                                <img src="./bootstrap/img/vna.jpg" width="300px" height="200px">
                                                <?php
                                            }
                                            if ($dateUpdate == 0) {
                                                ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : - </p>
                                            <?php } if ($dateUpdate != 0) { ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : <?php echo $dateUpdate; ?></p>
                                            <?php } ?>
                                            <p>Description : <?php echo $dataGalleryVid['description_album']; ?></p>
                                            <p>Total <?php echo $dataGalleryVid['type_album']; ?> : <?php echo $dataGalleryVid['total']; ?></p>
                                            <a href="videos.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Open</a>
                                            <a href="editGalVid.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                            <a href="remGalVid.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this album? If you click Yes everything on this album will be deleted');"><span class="glyphicon glyphicon-remove"></span> Remove</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <?php
                            $halaman = "SELECT COUNT(*) AS jumData, alb.*,(select count(vid.id_galery) from galery vid where vid.id_album = alb.id_album) AS total,
                            (select g.video from galery g where g.id_album = alb.id_album order by g.date_video DESC limit 0,1) as film 
                             FROM album AS alb where alb.type_album = 'Video' ORDER BY date_album_update DESC ";
                            $hasil = mysql_query($halaman);
                            $data = mysql_fetch_array($hasil);

                            $jumData = $data['jumData'];

                            // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

                            $jumPage = ceil($jumData / $dataPerPage);

                            // menampilkan link previous
                            echo "<ul class='pagination'>";
                            if ($noPage > 1)
                                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage - 1) . "'>Prev</a></li>";

                            // memunculkan nomor halaman dan linknya

                            for ($page = 1; $page <= $jumPage; $page++) {
                                if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
                                    if (($showPage == 1) && ($page != 2))
                                        echo "<li class='disabled'><a href='#'>...</a></li>";
                                    if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                                        echo "<li class='disabled'><a href='#'>...</a></li>";
                                    if ($page == $noPage)
                                        echo " <li class='active'><a href='#'>" . $page . "</a></li>";
                                    else
                                        echo " <li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . $page . "'>" . $page . "</a></li> ";
                                    $showPage = $page;
                                }
                            }

                            // menampilkan link next
                            if ($noPage < $jumPage)
                                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage + 1) . "'>Next</a></li>";

                            echo "</ul><span class='label label-info pull-right'>Total Video : $jumData</span>";
                        }
                        ?>
                    </div>
                </div>
                <!-- end content -->

                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- end left -->
            </body>
        </html>
        <?php
    }
}
?>