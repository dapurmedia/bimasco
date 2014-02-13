<?php
include ("./connect/connection.php");
include("header.php");
$query = mysql_query("SELECT * FROM beranda");
$dataHome = mysql_fetch_array($query);
$isi = nl2br($dataHome['isi']);
?>
<!-- FULL BACKGROUND IMAGE -->

<!--<div id="content" class="sidebox">
    <div class="inner">
        <h3>Kurs Rupiah</h3>
<?php include './bca.php'; ?>
        <h3>Weather</h3>
        <div style="margin-left: 0px;">
            <script src="http://www.weatherforecastmap.com/weather101.php?zona=indonesia_surabaya"></script>
            <div id="cont_db3f3947bee0135d8d4b76b32f4d3996">
                <span id="h_db3f3947bee0135d8d4b76b32f4d3996"><a id="a_db3f3947bee0135d8d4b76b32f4d3996" href="http://www.theweather.com/" target="_blank" rel="nofollow" style="color:#808080;font-family:Helvetica;font-size:14px;">Weather</a> Surabaya</span>
                <script type="text/javascript" src="http://www.theweather.com/wid_loader/db3f3947bee0135d8d4b76b32f4d3996"></script>
            </div>
        </div>
    </div>
</div>-->

<div id="box-container">
    <div id="page-wrap">
        <div id="container">
            <?php include './menu.php'; ?>
            <div class="content-container light-fonts">
                <div class="featured-heading2">
                    <h3 class="custom-color">Welcome to</h3>
                    <h1><?php echo $dataHome['judul']; ?></h1>
                </div><!-- close .featured-heading -->
                <div class="featured-text">
                    <p><?php echo $isi; ?></p>
                </div><!-- close .featured-text -->
                <div class="content-heading right-align">

                </div>
            </div><!-- close #content-container -->

            <!-- Background Slides -->
            <div id="featured">
                <img src="images/backgrounds/background2-image-600tall.jpg" alt="background image" />
                <img src="images/backgrounds/background3-image-600tall.jpg" alt="background image" />
                <img src="images/backgrounds/background4-image-600tall.jpg" alt="background image" />
                <img src="images/backgrounds/background-image-600tall.jpg" alt="background image" />
            </div><!-- close #featured -->
            <script type="text/javascript">
                $(window).load(function() {
                    $('#featured').orbit({
                        animation: 'fade', // fade, horizontal-slide, vertical-slide, horizontal-push
                        animationSpeed: 1200, // how fast animtions are
                        timer: true, // true or false to have the timer
                        advanceSpeed: 4200, // if timer is enabled, time between transitions 
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