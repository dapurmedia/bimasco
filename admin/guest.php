<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        if ($_GET['del']) {
            $query = mysql_query("DELETE FROM guest WHERE id_guest = '$_GET[del]'");
            if ($query) {
                echo "<script>alert('Data guest has been deleted');</script>";
            }
        }
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
                        $dataPerPage = 5;
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

                        $query = mysql_query("SELECT * FROM guest ORDER BY id_guest DESC LIMIT $offset, $dataPerPage");
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
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
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Title</th>
                                    <th style="text-align: center;">From</th>
                                    <th style="text-align: center;">Times</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;" colspan="2">Action</th>
                                    </thead>
                                    <?php
                                    while ($row = mysql_fetch_array($query)) {
                                        if ($row['readed'] == 'N') {
                                            $reads = '<h4 class="label label-danger">No Read</h4>';
                                        } else if ($row['readed'] == 'Y') {
                                            $reads = 'Readed';
                                        }
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $nom . "."; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['time']; ?></td>
                                            <td style="text-align: center;"><?php echo $reads; ?></td>
                                            <td style="text-align: center;width: 25%" colspan="2">
                                                <a href="viewGuest.php?id=<?php echo $row[id_guest]; ?>" class="btn btn-default" id="element" data-toggle="tooltip" title="view guest">
                                                    <span class="glyphicon glyphicon-eye-open"></span> View</a>
                                                <a href="?del=<?php echo $row[id_guest]; ?>" class="btn btn-danger" id="element" data-toggle="tooltip" title="remove guest" onClick="return confirm('Are you sure?');">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $nom++;
                                    }
                                    ?>  
                                </table>
                                <?php
                                $halaman = "SELECT COUNT(*) AS jumData FROM guest ORDER BY id_guest DESC";
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

                                echo "</ul><span class='label label-info pull-right'>Total Guest : $jumData</span>";
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
