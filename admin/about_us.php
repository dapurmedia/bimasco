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
                <script src="bootstrap/js/bootstrap-dropdown.js"></script>
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
                        $query = mysql_query("SELECT * FROM `tentang` ORDER BY id_tentang DESC");
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
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
