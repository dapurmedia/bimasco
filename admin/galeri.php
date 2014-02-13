<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
<?php
session_start();
include '../connect/connection.php';
include './date_function.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
<<<<<<< HEAD
=======

>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
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
                    function validasi(form_search) {
                        valid = true;

                        if (form_search.search_form.value.trim() === "") {
                            alert("Field must be fill.");
                            form_search.search_form.focus();
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
                        $dataPerPage = 4;
                        if (isset($_GET['page'])) {
                            $noPage = $_GET['page'];
<<<<<<< HEAD
                        }
                        else
=======
                        } else
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                            $noPage = 1;
                        $offset = ($noPage - 1) * $dataPerPage;

                        if ($noPage == 1) {
                            $nom = ($noPage - 1) * $dataPerPage + 1;
                        } else {
                            $nom = ($noPage - 1) * $dataPerPage + 1;
                        }
                        $query = mysql_query("SELECT alb.*, (select count(pht.id_galery) from galery pht where pht.id_album = alb.id_album) AS total,
<<<<<<< HEAD
                                        (select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
                                        FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC limit $offset, $dataPerPage");
=======
										(select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
										FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC limit $offset, $dataPerPage");
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10


                        $noPage = mysql_num_rows($query);

                        // show data if empty
                        if ($noPage == 0) {
                            ?>
<<<<<<< HEAD
                            <div class="alert alert-warning">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new Gallery Photo click the button below</p>
                                <p><button onClick="document.location = 'addGal.php';" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add New Album Photo</button></p>
=======
                            <div class="alert alert-block">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new Gallery Photo click the button below</p>
                                <p><button onClick="document.location = 'addGal.php';" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add New Album</button></p>
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($noPage != 0) {
<<<<<<< HEAD
                            ?>
                            <button onClick="document.location = 'addGal.php';" class="btn btn-group"><span class="glyphicon glyphicon-plus"></span> Add New Album Photo</button>
                            <br/><br/>
                            <div class="row">
                                <?php
                                while ($dataGallery = mysql_fetch_array($query)) {
                                    $date = dateAll($dataGallery['date_album']);
                                    $dateUpdate = dateAll($dataGallery['date_album_update']);
                                    ?>
                                    <div class="col-sm-3 col-lg-3">
                                        <div class="thumbnail">
                                            <h3><?php echo $dataGallery['title_album'] ?></h3>
                                            <?php if ($dataGallery['picture'] != NULL) { ?>
                                                <img src="../admin/uploads/images/<?php echo $dataGallery['picture'] ?>"  width="300px" height="200px" >
                                            <?php } if ($dataGallery['picture'] == NULL) { ?>
                                                <img src="./bootstrap/img/ia.jpg" width="300px" height="200px">
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
                                            <p>Description : <?php echo $dataGallery['description_album']; ?></p>
                                            <p>Total <?php echo $dataGallery['type_album']; ?> : <?php echo $dataGallery['total']; ?></p>
                                            <a href="photos.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Open</a>
                                            <a href="editGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                            <a href="remGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this album? If you click Yes everything on this album will be deleted');"><span class="glyphicon glyphicon-remove"></span> Remove</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            $halaman = "SELECT COUNT(*) AS jumData, alb.*, (select count(pht.id_galery) from galery pht where pht.id_album = alb.id_album) AS total,
                                                (select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
                                                FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC ";
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

                            echo "</ul><span class='label label-info pull-right'>Total Album : $jumData</span>";
                        }
                        ?>
=======
                            $jmldata = mysql_num_rows($query);
                            ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <!--<center><h2><span class="label label-success">Manage User</span></h2></center>-->
                                    <button onClick="document.location = 'addGal.php';" class="btn btn-group pull-left"><span class="glyphicon glyphicon-plus"></span> Add New Album</button>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_search" onsubmit="return validasi(this);">
                                        <div class="row">
                                            <div class="col-lg-4 pull-right">
                                                <div class="input-group">
                                                    <input type="text" name="search_form" class="form-control" placeholder="search...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="submit" name="seaching">Search</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                        <?php
                                        while ($dataGallery = mysql_fetch_array($query)) {
                                            $date = dateAll($dataGallery['date_album']);
                                            $dateUpdate = dateAll($dataGallery['date_album_update']);
                                            ?>
                                            <div class="col-sm-3">
                                                <div class="thumbnail">
                                                    <h3><?php echo $dataGallery['title_album'] ?></h3>
                                                    <?php if ($dataGallery['picture'] != NULL) { ?>
                                                        <img src="../admin/uploads/images/<?php echo $dataGallery['picture'] ?>" class="polaroid">
                                                    <?php } if ($dataGallery['picture'] == NULL) { ?>
                                                        <img src="../bootstrap/img/family.png" class="polaroid">
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
                                                    <p>Description : <?php echo $dataGallery['description_album']; ?></p>
                                                    <p>Total <?php echo $dataGallery['type_album']; ?> : <?php echo $dataGallery['total']; ?></p>
                                                    <a href="photos.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-primary"><i class="icon-folder-open icon-white"></i> Open</a>
                                                    <a href="editGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn"><i class="icon-pencil"></i> Edit</a>
                                                    <a href="remGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this album? If you click Yes everything on this album will be deleted');"><i class="icon-remove icon-white"></i> Remove</a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $halaman = "SELECT alb.*, (select count(pht.id_galery) from galery pht where pht.id_album = alb.id_album) AS total,
												(select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
												FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC ";
                                    $hasil = mysql_query($halaman);
                                    $data = mysql_fetch_array($hasil);

                                    $jumData = $data['jumData'];

                                    // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

                                    $jumPage = ceil($jumData / $dataPerPage);

                                    // menampilkan link previous

                                    if ($noPage > 1)
                                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage - 1) . "'>Prev</a>";

                                    // memunculkan nomor halaman dan linknya

                                    for ($page = 1; $page <= $jumPage; $page++) {
                                        if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
                                            if (($showPage == 1) && ($page != 2))
                                                echo "...";
                                            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                                                echo "...";
                                            if ($page == $noPage)
                                                echo " <b>" . $page . "</b>";
                                            else
                                                echo " <a href='" . $_SERVER['PHP_SELF'] . "?page=" . $page . "'>" . $page . "</a> ";
                                            $showPage = $page;
                                        }
                                    }

                                    // menampilkan link next
                                    if ($noPage < $jumPage)
                                        echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage + 1) . "'>Next</a></li>";

                                    echo "</ul>";
                                    ?>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
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
<<<<<<< HEAD

=======
=======
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
                    function validasi(form_search) {
                        valid = true;

                        if (form_search.search_form.value.trim() === "") {
                            alert("Field must be fill.");
                            form_search.search_form.focus();
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
                        $query = mysql_query("SELECT alb.*, (select count(pht.id_galery) from galery pht where pht.id_album = alb.id_album) AS total,
                (select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
                FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC limit $offset, $dataPerPage");


                        $noPage = mysql_num_rows($query);

                        // show data if empty
                        if ($noPage == 0) {
                            ?>
                            <div class="alert alert-block">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new Gallery Photo click the button below</p>
                                <p><button onClick="document.location = 'addUser.php';" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add New Album</button></p>
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($noPage != 0) {
                            ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <!--<center><h2><span class="label label-success">Manage User</span></h2></center>-->
                                    <button onClick="document.location = 'addUser.php';" class="btn btn-group pull-left"><span class="glyphicon glyphicon-plus"></span> Add New Album</button>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_search" onsubmit="return validasi(this);">
                                        <div class="row">
                                            <div class="col-lg-4 pull-right">
                                                <div class="input-group">
                                                    <input type="text" name="search_form" class="form-control" placeholder="search...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="submit" name="seaching">Search</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                        <?php
                                        while ($dataGallery = mysql_fetch_array($query)) {
                                            $date = dateAll($dataGallery['date_album']);
                                            $dateUpdate = dateAll($dataGallery['date_album_update']);
                                            ?>
                                            <div class="col-sm-3">
                                                <div class="thumbnail">
                                                    <h3><?php echo $dataGallery['title_album'] ?></h3>
                                                    <?php if ($dataGallery['picture'] != NULL) { ?>
                                                        <img src="../admin/uploads/images/<?php echo $dataGallery['picture'] ?>" class="polaroid">
                                                    <?php } if ($dataGallery['picture'] == NULL) { ?>
                                                        <img src="../bootstrap/img/family.png" class="polaroid">
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
                                                    <p>Description : <?php echo $dataGallery['description_album']; ?></p>
                                                    <p>Total <?php echo $dataGallery['type_album']; ?> : <?php echo $dataGallery['total']; ?></p>
                                                    <a href="photos.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-primary"><i class="icon-folder-open icon-white"></i> Open</a>
                                                    <a href="editGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn"><i class="icon-pencil"></i> Edit</a>
                                                    <a href="remGalPho.php?title=<?php echo $dataGallery['title_album']; ?>&id=<?php echo $dataGallery['id_album']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this album? If you click Yes everything on this album will be deleted');"><i class="icon-remove icon-white"></i> Remove</a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $halaman = "SELECT alb.*, (select count(pht.id_galery) from galery pht where pht.id_album = alb.id_album) AS total,
                (select g.photo from galery g where g.id_album = alb.id_album order by g.date_photo DESC limit 0,1) as picture
                FROM album AS alb where alb.type_album = 'Photo' ORDER BY date_album_update DESC ";
                                    $hasil = mysql_query($halaman);
                                    $data = mysql_fetch_array($hasil);

                                    $jumData = $data['jumData'];

                                    // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

                                    $jumPage = ceil($jumData / $dataPerPage);

                                    // menampilkan link previous

                                    if ($noPage > 1)
                                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage - 1) . "'>Prev</a>";

                                    // memunculkan nomor halaman dan linknya

                                    for ($page = 1; $page <= $jumPage; $page++) {
                                        if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
                                            if (($showPage == 1) && ($page != 2))
                                                echo "...";
                                            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                                                echo "...";
                                            if ($page == $noPage)
                                                echo " <b>" . $page . "</b>";
                                            else
                                                echo " <a href='" . $_SERVER['PHP_SELF'] . "?page=" . $page . "'>" . $page . "</a> ";
                                            $showPage = $page;
                                        }
                                    }

                                    // menampilkan link next
                                    if ($noPage < $jumPage)
                                        echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage + 1) . "'>Next</a></li>";

                                    echo "</ul>";
                                    ?>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
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
>>>>>>> 86502e58e23657a5c85b307631b1a83c7531ab04
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
