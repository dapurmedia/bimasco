<?php
include ("./connect/connection.php");
include("header.php");
$query = mysql_query("SELECT tentang.*, beranda.* FROM tentang , beranda");
$dataAbout = mysql_fetch_array($query);
?>

<!-- FULL BACKGROUND IMAGE -->

<div id="box-container">
    <div id="page-wrap">

        <div id="container">
            <?php include './menu.php'; ?>

            <div class="content-container">
                <div class="content-heading right-align">
                    <!--<h5>About</h5>-->
                    <h1><?php echo $dataAbout['judul'] ?></h1>
                </div>
                <ul class="sub-navigation right-align">
                    <!--<li class="current"><a href="company.php">About Us</a></li>-->
                    <li><a href="<?php $_SERVER['PHP_SELF']; ?>"><?php echo $dataAbout['judul_tentang'] ?></a></li>
                    <!--                    <li><a href="columns.php">Columns</a></li>
                                        <li><a href="lightbox.php">Lightbox Examples</a></li>-->
                </ul>


                <div class="scroll-pane" style="height:370px;"><!-- customize the height for the scroll box -->
                    <p>
                        <?php echo $dataAbout['isi_tentang']; ?>
                    </p>

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