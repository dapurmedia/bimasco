<?php
include ("./connect/connection.php");
include("header.php");
$query = mysql_query("SELECT service.*, menu.menu , (SELECT s.isi_service FROM service s WHERE s.judul_service = 'Products & Services') as head,
    (SELECT service.judul_service FROM service WHERE service.judul_service = 'Products & Services') as title FROM menu INNER JOIN service ON service.id_service = menu.id_menu");
$dataServe = mysql_fetch_array($query);
?>

<!-- FULL BACKGROUND IMAGE -->

<div id="box-container">
    <div id="page-wrap">

        <div id="container">
            <?php include './menu.php'; ?>

            <div class="content-container">
                <div class="content-heading right-align">
                    <h1>Services</h1>
                </div>
                <div class="scroll-pane" style="height:370px;"><!-- customize the height for the scroll box -->
                    <h4><?php echo $dataServe['title']; ?></h4>
                    <p>
                        <?php echo $dataServe['head']; ?>
                    </p>

                    <div class="divider"></div>
                    <?php while ($row = mysql_fetch_array($query)) { ?>
                        <div class="team-member">
                            <h5><?php echo $row['judul_service']; ?></h5>
                            <p>
                                <?php echo $row['isi_service']; ?>
                            </p>
                        </div>
                    <?php } ?>
                </div><!-- close .scroll-pane -->
                <!-- the jScrollPane script -->
                <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
                <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
                <script type="text/javascript" id="sourcecode">
                    $(function()
                    {
                        $('.scroll-pane').jScrollPane();
                    });
                </script>

            </div><!-- close #content-container -->

            <!-- Background Slides -->
            <div id="featured"> 
                <img src="images/backgrounds/company-background.jpg" alt="background image" />
            </div><!-- close #featured -->
            <script type="text/javascript">
                $(window).load(function() {
                    $('#featured').orbit({
                        animation: 'fade', // fade, horizontal-slide, vertical-slide, horizontal-push
                        animationSpeed: 1200, // how fast animtions are
                        timer: true, // true or false to have the timer
                        advanceSpeed: 4000, // if timer is enabled, time between transitions 
                        pauseOnHover: false, // if you hover pauses the slider
                        startClockOnMouseOut: false, // if clock should start on MouseOut
                        startClockOnMouseOutAfter: 1000, // how long after MouseOut should the timer start again
                        directionalNav: false, // manual advancing directional navs
                        captions: true, // do you want captions?
                        captionAnimation: 'fade', // fade, slideOpen, none
                        captionAnimationSpeed: 800, // if so how quickly should they animate in
                        bullets: false, // true or false to activate the bullet navigation
                        bulletThumbs: false, // thumbnails for the bullets
                        bulletThumbLocation: '', // location from this file where thumbs will be
                        afterSlideChange: function() {
                        } 	 // empty function 
                    });
                });
            </script>
            <!-- End Background Slides -->

        </div><!-- close #container -->
        <?php include("footer.php"); ?>		
        <?php include("sidebar.php"); ?>