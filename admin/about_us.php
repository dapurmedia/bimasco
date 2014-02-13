<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Administrator - Bimasco Cargo System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">

                <!-- Le styles -->
                <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
                <link href="bootstrap/css/style.css" rel="stylesheet">
                <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
                <script type="text/javascript" src="bootstrap/js/jquery-1.7.2.min.js"></script>
<<<<<<< HEAD
                <script src="bootstrap/js/bootstrap-dropdown.js"></script>
=======
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
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
<<<<<<< HEAD
                        $query = mysql_query("SELECT * FROM `tentang` ORDER BY id_tentang DESC");
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
=======
                        $dataPerPage = 6;
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

                        $query = mysql_query("SELECT * FROM `tentang` ORDER BY id_tentang DESC LIMIT $offset, $dataPerPage");

                        //loop through fetched data
                        $paging = mysql_num_rows($query);
                        // show data if empty
//                        if ($paging == 0) {
                        ?>
                        <!--                            <div class="alert alert-warning">
                                                        <h4>There's No Data Here</h4>
                                                        <p>To fill a new about us click the button below</p>
                                                        <p><button onClick="document.location = 'addAbout.php';" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add New</button></p>
                                                    </div>-->
                        <?php
//                        }
                        // show data if data is not empty 
//                        elseif ($paging != 0) {
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <!--<button onClick="document.location = 'addAbout.php';" class="btn btn-group pull-left"><span class="glyphicon glyphicon-plus"></span> Add New</button>-->
<!--                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_search" onsubmit="return validasi(this);">
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
                                </form>-->
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Title Content</th>
                                    <th style="text-align: center;">Content</th>
                                    <th style="text-align: center;" colspan="2">Action</th>
                                    </thead>
                                    <?php
                                    while ($row = mysql_fetch_array($query)) {
                                        $isi = nl2br($row['isi_tentang']);
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $nom . "."; ?></td>
                                            <td><?php echo $row['judul_tentang']; ?></td>
                                            <td style="width: 70%"><?php echo $isi; ?></td>
                                            <td style="text-align: center;width: 18%" colspan="2">
                                                <a href="editAbout.php?id=<?php echo $row['id_tentang']; ?>" class="btn btn-default" id="element" data-toggle="tooltip" title="edit user">
                                                    <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $nom++;
                                    }
                                    ?>  
                                </table>
                                <?php
                                $halaman = "SELECT COUNT(*) AS jumData FROM tentang ORDER BY id_tentang DESC";
                                $hasil = mysql_query($halaman);
                                $data = mysql_fetch_array($hasil);

                                $jumData = $data['jumData'];

<<<<<<< HEAD
=======
                                // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

                                $jumPage = ceil($jumData / $dataPerPage);

                                // menampilkan link previous
//                                    echo "<ul class='pagination'><li>";
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
                                    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($noPage + 1) . "'>Next</a>";

>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                                echo "<span class='label label-info pull-right'>Total Content : $jumData</span>";
                                ?>

                                <?php
//                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- end content -->
                </div>

                <?php include './footer.php'; ?>


                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
        </html>
        <?php
    }
}
?>
