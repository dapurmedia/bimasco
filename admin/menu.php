<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        if ($_GET['del']) {
            $query = mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[del]'");
            if ($query) {
                echo "<script>alert('Data menu has been deleted');</script>";
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

                        $query = mysql_query("SELECT * FROM `menu` ORDER BY id_menu DESC LIMIT $offset, $dataPerPage");

                        //loop through fetched data
                        $paging = mysql_num_rows($query);
                        // show data if empty
                        if ($paging == 0) {
                            ?>
                            <div class="alert alert-warning">
                                <h4>There's No Data Here</h4>
                                <p>To fill a new menu click the button below</p>
                                <p><button onClick="document.location = 'addMenu.php';" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Add New Menu</button></p>
                            </div>
                            <?php
                        }
                        // show data if data is not empty 
                        elseif ($paging != 0) {
                            ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <button onClick="document.location = 'addMenu.php';" class="btn btn-group"><span class="glyphicon glyphicon-plus"></span> Add New Menu</button>
<!--                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_search" onsubmit="return validasi(this);">
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
                                        <th style="text-align: center;">Menu</th>
                                        <th style="text-align: center;" colspan="3">Action</th>
                                        </thead>
                                        <?php
                                        while ($row = mysql_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $nom . "."; ?></td>
                                                <td><?php echo $row['menu']; ?></td>
                                                <td style="text-align: center;width: 25%" colspan="3">
                                                    <a href="editMenu.php?id=<?php echo $row[id_menu]; ?>" class="btn btn-default" id="element" data-toggle="tooltip" title="edit user">
                                                        <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                                    <a href="?del=<?php echo $row[id_menu]; ?>" class="btn btn-danger" id="element" data-toggle="tooltip" title="remove user" onClick="return confirm('Are you sure?');">
                                                        <span class="glyphicon glyphicon-remove"></span> Remove</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $nom++;
                                        }
                                        ?>  
                                    </table>
                                    <?php
                                    $halaman = "SELECT COUNT(*) AS jumData FROM menu ORDER BY id_menu DESC";
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

                                    echo "</ul><span class='label label-info pull-right'>Total Menu : $jumData</span>";
                                    ?>

                                    <?php
                                }
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
