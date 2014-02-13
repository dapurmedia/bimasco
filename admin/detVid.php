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
			<script type="text/javascript" src="bootstrap/js/html5gallery/html5gallery.js"></script>
			<script type="text/javascript">
            function closeWin()
            {
                this.close();
            }
        </script>
    </head>
    <body>
        <?php
        include '../connect/connection.php';
		include './date_function.php';

        $query = mysql_query("SELECT * FROM galery WHERE id_galery='$_GET[id]'");
        $row = mysql_fetch_array($query);
        ?>
        <div class="container">
<!--            <video width="750px" height="600px" controls src="uploads/videos/<?php echo $row['video']; ?>" type="video/mp4" id="element" data-toggle="tooltip" title="videos" style="margin-bottom: 50px; margin-top: -10px;">Your Browser Doesn't Support</video>-->
            <div style="text-align:center;">
                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="gallery" data-width="850" data-height="472" data-resizemode="fill">
                    <?php
                    $date = dateAll($row['date_video']);
                    ?>
                    <a href="<?php echo $row['video']; ?>" ><img src="../bootstrap/img/2.jpg" alt="<?php echo $row['title_video'] . "<br/>" . $date . "<br/>" . $row['description_video']; ?>"></a>

                </div>
            </div>
            <span class="label label-info">
                <h1><?php echo $row[description_video] ?></h1>
            </span>
            <br/>
            <button style="margin-top: 15px;" class="btn btn-inverse" onClick="closeWin();">Close</button>
        </div>
    </body>
</html>