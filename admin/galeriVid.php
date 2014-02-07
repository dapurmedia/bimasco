<?php
session_start();
include '../connect/connection.php';
include './date_function.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {


        include './pagination.php'; //include pagination file
        //pagination variables
        $no = 1;
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : $no;
        $per_page = 4; //how much records you want to show
        $adjacents = $no; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;

        //Count the total number of row in your table*/
        $count_query = mysql_query("SELECT COUNT(id_album) AS numrows FROM album WHERE type_album = 'Video'");
        $row = mysql_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows / $per_page);
        $reload = 'galleryVid.php';

        //main query to fetch the data
        $query = mysql_query("SELECT alb.*,(select count(vid.id_galery) from galery vid where vid.id_album = alb.id_album) AS total,
                (select g.video from galery g where g.id_album = alb.id_album order by g.date_video DESC limit 0,1) as film 
                FROM album AS alb where alb.type_album = 'Video' ORDER BY date_album_update DESC LIMIT $offset,$per_page");

        //loop through fetched data
        ?>
        <ul class="thumbnails">
            <?php
            while ($dataGalleryVid = mysql_fetch_array($query)) {
                $date = dateAll($dataGalleryVid['date_album']);
                $dateUpdate = dateAll($dataGalleryVid['date_album_update']);
                ?>
                <li class="span3">
                    <div class="thumbnail">
                        <h3><?php echo $dataGalleryVid['title_album'] ?></h3>
                        <?php if ($dataGalleryVid['film'] != NULL) { ?>
                            <img src="../bootstrap/img/3.jpg" class="polaroid">
                        <?php } if ($dataGalleryVid['film'] == NULL) { ?>
                            <img src="../bootstrap/img/2.jpg" class="polaroid">
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
                        <a href="videos.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn btn-primary"><i class="icon-folder-open icon-white"></i> Open</a>
                        <a href="editGalVid.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn"><i class="icon-pencil"></i> Edit</a>
                        <a href="remGalVid.php?title=<?php echo $dataGalleryVid['title_album']; ?>&id=<?php echo $dataGalleryVid['id_album']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this album? If you click Yes everything on this album will be deleted');"><i class="icon-remove icon-white"></i> Remove</a>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
        echo paginate($reload, $page, $total_pages, $adjacents);
    } else {
        ?>
        <!DOCTYPE>
        <html>
            <head>
                <title>..::Admin Page || my FAMILY ::.</title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
                <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
                <link href="../bootstrap/css/default.css" rel="stylesheet"/>
                <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
                <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
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
                <div class="container">
                    <!-- Header -->        
                    <?php include_once './header.php'; ?>        
                    <!-- End Header -->

                    <!-- Content -->  
                    <div class="row-fluid">
                        <div class="span12">
                            <?php
                            $query = mysql_query("SELECT alb.*,(select count(vid.id_galery) from galery vid where vid.id_album = alb.id_album) AS total,
                (select g.video from galery g where g.id_album = alb.id_album order by g.date_video DESC limit 0,1) as film 
                FROM album AS alb where alb.type_album = 'Video' ORDER BY date_album_update DESC");
                            $noPage = mysql_num_rows($query);
                            // show data if empty
                            if ($noPage == 0) {
                                ?>
                                <div class="alert alert-block">
                                    <h4>There's No Data Here</h4>
                                    <p>To fill a new Gallery Video click the button below</p>
                                    <p><button onClick="document.location = 'addGalAlbVid.php';" class="btn btn-primary" style="margin-bottom: 10px;"><i class="icon-plus-sign icon-white"></i> Add Album</button></p>
                                </div>
                                <?php
                            }
                            // show data if data is not empty 
                            elseif ($noPage != 0) {
                                ?>
                                <button onClick="document.location = 'addGalAlbVid.php';" class="btn btn-primary" style="margin-bottom: 10px;"><i class="icon-plus-sign icon-white"></i> Add Album</button>
                                <div id="loader"><img src="../bootstrap/img/loader.gif"></div><div class="outer_div"></div>
                                <span class="label label-inverse pull-left">Total Picture : <?php echo $noPage; ?></span>

                                <?php
                            }
                            ?>
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
    }
}
?>