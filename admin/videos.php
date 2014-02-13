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
            </head>
            <body>
                <div id="wrap">
                    <!-- Header -->        
                    <?php include './header.php'; ?>        
                    <!-- End Header -->

                    <!-- Content -->  
                    <div class="container">
                        <?php
                        $dataPerPage = 3;
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

                        $query = mysql_query("SELECT a.id_album, a.title_album, g.* FROM album AS a INNER JOIN galery AS g ON a.id_album = g.id_album
                        WHERE a.id_album = '$_GET[id]' ORDER BY date_update_video DESC LIMIT $offset, $dataPerPage");
                        $noPage = mysql_num_rows($query);

                        // show data if empty
                        if ($noPage == 0) {
                            ?>
                            <div class="alert alert-warning">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new video click the button below</p>
                                <p><button onClick="document.location = 'addGalVid.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn btn-primary" style="margin-bottom: 10px;"><i class="icon-plus-sign icon-white"></i>Add New Video</button></p>
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($noPage != 0) {
                            ?>
                            <button onClick="document.location = 'addGalVid.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn btn-group pull-left"><span class="glyphicon glyphicon-plus"></span>Add New Video</button>
                            <br/><br/>
                            <div class="row">
                                <?php
                                while ($dataVid = mysql_fetch_array($query)) {
                                    $date = dateAll($dataVid['date_video']);
                                    $dateUpdate = dateAll($dataVid['date_update_video']);
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="thumbnail">
                                            <h3><?php echo $dataVid['title_video'] ?></h3>
                                            <div class="html5gallery" data-html5player="true" data-width="343" data-height="260" data-src="<?php echo $dataVid['video']; ?>">
                                            </div>
                                            <?php
                                            if ($dateUpdate == 0) {
                                                ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : - </p>
                                            <?php } if ($dateUpdate != 0) { ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : <?php echo $dateUpdate; ?></p>
                                            <?php } ?>
                                            <p>Description :<?php echo $dataVid['description_video']; ?></p>
                                            <p>Written : <i class="icon-pencil"></i> <?php echo $dataVid['contribution_video']; ?></p>
                                            <p>Location : <?php echo $dataVid['place_video']; ?></p>
                                            <a href="editVid.php?title = <?php echo $_GET['title']; ?>&id=<?php echo $dataVid[id_album]; ?>&idVideo=<?php echo $dataVid[id_galery]; ?>" class="btn btn-primary" id="element" data-toggle="tooltip" title="edit video"><i class="icon-edit"></i><span class="glyphicon glyphicon-pencil"></span> Edit </a> 
                                            <a href="remVid.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $dataVid[id_album]; ?>&idVideo=<?php echo $dataVid[id_galery]; ?>" class="btn btn-danger" id="element" data-toggle="tooltip" title="remove video" onClick="return confirm('Are you sure to delete this?');"><i class="icon-remove"></i><span class="glyphicon glyphicon-remove"></span>Remove</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            $halaman = "SELECT COUNT(*) AS jumData, a.id_album, a.title_album, g.* FROM album AS a INNER 
                                JOIN galery AS g ON a.id_album = g.id_album WHERE a.id_album = '$_GET[id]'";
                            $hasil = mysql_query($halaman);
                            $data = mysql_fetch_array($hasil);

                            $jumData = $data['jumData'];

                            // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
                            $jumPage = ceil($jumData / $dataPerPage);

                            // menampilkan link previous
                            echo "<ul class='pagination'>";
                            if ($noPage > 1)
                                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage - 1) . "title=" . $_GET['title'] . "&id=" . $_GET['id'] . "'>Prev</a></li>";

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
                                        echo " <li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . $page . "&title=" . $_GET['title'] . "&id=" . $_GET['id'] . "'>" . $page . "</a></li> ";
                                    $showPage = $page;
                                }
                            }

                            // menampilkan link next
                            if ($noPage < $jumPage)
                                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage + 1) . "&title=" . $_GET['title'] . "&id=" . $_GET['id'] . "'>Next</a></li>";

                            echo "</ul><span class='label label-info pull-right'>Total Video : $jumData</span>";
                        }
                        ?>
                        <br/>
                        <button type="submit" class="btn btn-default" onClick="document.location = 'galeriVid.php';"><i class="icon-circle-arrow-left icon-white"></i>Back</button>
                        <br/>
                    </div>
                </div>

                <!-- end content -->

                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <script src="bootstrap/js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="bootstrap/js/jquery-1.7.2.min.js"></script>
                <script type="text/javascript" src="bootstrap/js/html5gallery/html5gallery.js"></script>
                <script type="text/javascript">
                                    $(document).ready(function() {
                                        load(1);
                                        $(".dropdown-toggle").dropdown();
                                        $('#element').tooltip('show');
                                    });
                </script>
                <!-- end left -->
            </body>
        </html>
        <?php
    }
}
?>