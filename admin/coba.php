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
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
                <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
                <link href="bootstrap/css/default.css" rel="stylesheet"/>
                <script src="bootstrap/js/jquery-1.7.2.min.js"></script>
                <script src="bootstrap/js/bootstrap-dropdown.js"></script>
                <script type="text/javascript" src="bootstrap/js/lib/jquery-1.10.1.min.js"></script>
                <script type="text/javascript" src="bootstrap/js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
                <script type="text/javascript" src="bootstrap/js/source/jquery.fancybox.js?v=2.1.5"></script>
                <link rel="stylesheet" type="text/css" href="bootstrap/js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

                <script type="text/javascript">
                    //                    $(function() {
                    //                                $(".dropdown-toggle").dropdown();
                    //                                $('#element').tooltip('show');
                    //                    });
                    $(document).ready(function() {
                        $('.fancybox').fancybox();

                        // Set custom style, close if clicked, change title type and overlay color
                        $(".fancybox-effects-c").fancybox({
                            wrapCSS: 'fancybox-custom',
                            closeClick: true,
                            openEffect: 'none',
                            helpers: {
                                title: {
                                    type: 'inside'
                                },
                                overlay: {
                                    css: {
                                        'background': 'rgba(238,238,238,0.85)'
                                    }
                                }
                            }
                        });
                    });
                </script>
                <style type="text/css">
                    .fancybox-custom .fancybox-skin {
                        box-shadow: 0 0 50px #222;
                    }
                </style>
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

                        $query = mysql_query("SELECT p.*,a.id_album,a.title_album FROM galery AS p INNER JOIN album AS a ON a.id_album = p.id_album WHERE 
                        a.id_album = '2' ORDER BY date_update_photo DESC LIMIT $offset, $dataPerPage");
                        $noPage = mysql_num_rows($query);

                        // show data if empty
                        if ($noPage == 0) {
                            ?>
                            <div class="alert alert-warning">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new photo click the button below</p>
                                <p><button onClick="document.location = 'addGalPho.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn btn-primary" style="margin-bottom: 10px;"><i class="icon-plus-sign icon-white"></i> Add New Photo</button></p>
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($noPage != 0) {
                            ?>
                            <button onClick="document.location = 'addGalPho.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>';" class="btn btn-group"><span class="glyphicon glyphicon-plus"></span> Add New Photo</button>
                            <br/><br/>
                            <div class="row">
                                <?php
                                while ($dataPho = mysql_fetch_array($query)) {
                                    $date = dateAll($dataPho['date_photo']);
                                    $dateUpdate = dateAll($dataPho['date_update_photo']);
                                    ?>
                                    <div class="col-sm-3">
                                        <div class="thumbnail">
                                            <h3><?php echo $dataPho['title_photo'] ?></h3>
                                            <a class="fancybox-effects-c" href="uploads/images/<?php echo $dataPho['photo']; ?>" title="<?php echo $dataPho['description_photo'] ?>">
                                                <img src="uploads/images/<?php echo $dataPho['photo']; ?>" alt="">
                                            </a>
                                            <?php if ($dateUpdate == 0) { ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : - </p>
                                            <?php } if ($dateUpdate != 0) { ?>
                                                <p>Date Created : <?php echo $date; ?></p>
                                                <p>Date Update : <?php echo $dateUpdate; ?></p>
                                            <?php } ?>
                                            <p>Description :<?php echo $dataPho['description_photo']; ?></p>
                                            <p>Written : <i class="icon-pencil"></i> <?php echo $dataPho['contribution_photo']; ?></p>
                                            <p>Location : <?php echo $dataPho['place_photo']; ?></p>
                                            <a href="editPho.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $dataPho[id_album]; ?>&idPhoto=<?php echo $dataPho[id_galery]; ?>" class="btn btn-default" id="element" data-toggle="tooltip" title="edit photo"><i class="icon-edit"></i><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                            <a href="remPho.php?title=<?php echo $_GET['title']; ?>&id=<?php echo $dataPho[id_album]; ?>&idPhoto=<?php echo $dataPho[id_galery]; ?>" class="btn btn-danger" id="element" data-toggle="tooltip" title="remove photo" onClick="return confirm('Are you sure to delete this?');"><i class="icon-remove"></i><span class="glyphicon glyphicon-remove"></span>Remove</a>
                                            <!--<a href="#" onclick="bukajendela('detPho.php?id=<?php echo $dataPho['id_galery']; ?>');" class="btn btn-info" id="element" data-toggle="tooltip" title="detail photo"><i class="icon-list-alt"></i>Preview</a>-->
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            $halaman = "SELECT COUNT(*) AS jumData, p.*,a.id_album,a.title_album FROM galery AS p INNER JOIN album AS a ON a.id_album = p.id_album WHERE 
                        a.id_album = '$_GET[id]'";
                            $hasil = mysql_query($halaman);
                            $data = mysql_fetch_array($hasil);

                            $jumData = $data['jumData'];

                            // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
                            $jumPage = ceil($jumData / $dataPerPage);

                            // menampilkan link previous
                            echo "<ul class='pagination'>";
                            if ($noPage > 1)
                                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage - 1) . "&title=" . $_GET['title'] . "&id=" . $_GET['id'] . "'>Prev</a></li>";

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

                            echo "</ul><span class='label label-info pull-right'>Total Photo : $jumData</span>";
                        }
                        ?>
                        <br/>
                        <button type="submit" class="btn btn-default" onClick="document.location = 'galeri.php';"><i class="icon-circle-arrow-left icon-white"></i>Back</button>    
                        <br/>
                    </div>
                </div>
                <!-- end content -->

                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <!--<script src="../js/jquery-1.10.2.min.js"></script>-->
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- end left -->
            </body>
        </html>
        <?php
    }
}
?>