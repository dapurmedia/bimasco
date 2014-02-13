<?php
include ("./connect/connection.php");
include("header.php");
$query = mysql_query("SELECT * FROM gallery ORDER BY id_gallery DESC");
?>

<!-- FULL BACKGROUND IMAGE -->

<div id="box-container">
    <div id="page-wrap">

        <div id="container">
            <div id="left-container">
                <?php include './menu.php'; ?>
            </div><!-- close #left-container -->

            <div class="content-container light-fonts">
                <div class="scroll-pane" style="height:360px;"><!-- customize the height for the scroll box -->
                    <div class="thumbnails">
                        <div class="col_1_4">
                            <a href="images/portfolio/img_1.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item1-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_2_4">
                            <a href="images/portfolio/img_2.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item2-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_3_4">
                            <a href="images/portfolio/img_3.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item3-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_4_4">
                            <a href="images/portfolio/img_4.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item4-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="clear"></div>
                        <br/>
                        <div class="col_1_4">
                            <a href="images/portfolio/img_5.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item5-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_2_4">
                            <a href="images/portfolio/img_6.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item6-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_3_4">
                            <a href="images/portfolio/img_7.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item7-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_4_4">
                            <a href="images/portfolio/img_8.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item8-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  

                        <div class="clear"></div>

                        <br/>

                        <div class="col_1_4">
                            <a href="images/portfolio/img_4.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item4-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_2_4">
                            <a href="images/portfolio/img_3.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item3-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_3_4">
                            <a href="images/portfolio/img_2.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item2-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="col_4_4">
                            <a href="images/portfolio/img_1.jpg" class="fancylightbox">
                                <img src="images/portfolio/portfolio-item1-thumb.jpg" alt="portfolio-item" width="135" height="117">
                            </a>
                        </div>  
                        <div class="clear"></div>
                    </div><!-- close .thumbnails -->
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

                <div class="content-heading right-align">
                    <br/>
                    <h3>Bimasco Cargo System</h3>
                    <h1>Gallery</h1>
                </div>
            </div><!-- close #content-container -->

            <!-- Background Slides -->
            <div id="featured"> 
                <img src="images/backgrounds/projects-background.jpg" alt="background image" />
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