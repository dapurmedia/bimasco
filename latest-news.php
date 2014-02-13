<?php
include ("./connect/connection.php");
include("header.php");
?>

<!-- FULL BACKGROUND IMAGE -->
<div id="box-container">
    <div id="page-wrap">

        <div id="container">
            <?php include './menu.php'; ?>
            <div class="content-container light-fonts">
                <div class="content-heading left-align latest-news-heading">
                    <h5>Latest</h5>
                    <h1>News</h1>
                </div>

                <div class="scroll-pane" style="height:405px; "><!-- customize the height for the scroll box -->

                    <div class="news_carousel"> <!-- begin carousel -->
                        <ul id="rotating-news">
                            <li>
                                <div class="news-post">
                                    <div class="scroll-pane">
                                        <div class="aligncenter"><img src="images/portfolio/sample_img_4.png" width="225" height="171" alt="news-image"></div>
                                        <h5>News Sample Title</h5>
                                        <div class="date-stamp"><h6>6/05/2011</h6></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet libero nec risus fermentum eu suscipit mauris sollicitudin. Morbi fringilla mattis velit, consectetur dignissim est tincidunt at.</p>
                                        <p><a href="#">Sample link</a> Nullam tempus tristique porta. Ut eget ante orci, vitae imperdiet magna. Ut elementum felis sed leo viverra sit amet venenatis magna ultrices. Phasellus mattis faucibus dolor convallis scelerisque. Suspendisse ut massa et ante fermentum mattis vel vitae nunc. Nulla varius libero non lorem semper consequat. Integer venenatis, neque sed mattis mollis, mauris velit adipiscing turpis, vel vulputate libero nulla non lacus. Sed id enim ante.</p>
                                    </div>
                                </div><!-- close .news-post -->
                            </li>

                            <li>
                                <div class="news-post">
                                    <div class="scroll-pane">
                                        <div class="aligncenter"><img src="images/portfolio/sample_img_5.png" width="225" height="171" alt="news-image"></div>
                                        <h5>Second Sample Title</h5>
                                        <div class="date-stamp"><h6>6/01/2011</h6></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet libero nec risus fermentum eu suscipit mauris sollicitudin. Morbi fringilla mattis velit, consectetur dignissim est tincidunt at.</p>
                                        <p><a href="#">Sample link</a> Nullam tempus tristique porta. Ut eget ante orci, vitae imperdiet magna. Ut elementum felis sed leo viverra sit amet venenatis magna ultrices. Phasellus mattis faucibus dolor convallis scelerisque. Suspendisse ut massa et ante fermentum mattis vel vitae nunc. Nulla varius libero non lorem semper consequat. Integer venenatis, neque sed mattis mollis, mauris velit adipiscing turpis, vel vulputate libero nulla non lacus. Sed id enim ante.</p>
                                    </div>
                                </div><!-- close .news-post -->
                            </li>


                            <li>
                                <div class="news-post">
                                    <div class="scroll-pane">
                                        <div class="aligncenter"><img src="images/portfolio/sample_img_3.png" width="225" height="171" alt="news-image"></div>
                                        <h5>Another Sample Title</h5>
                                        <div class="date-stamp"><h6>5/25/2011</h6></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet libero nec risus fermentum eu suscipit mauris sollicitudin. Morbi fringilla mattis velit, consectetur dignissim est tincidunt at.</p>
                                        <p><a href="#">Sample link</a> Nullam tempus tristique porta. Ut eget ante orci, vitae imperdiet magna. Ut elementum felis sed leo viverra sit amet venenatis magna ultrices. Phasellus mattis faucibus dolor convallis scelerisque. Suspendisse ut massa et ante fermentum mattis vel vitae nunc. Nulla varius libero non lorem semper consequat. Integer venenatis, neque sed mattis mollis, mauris velit adipiscing turpis, vel vulputate libero nulla non lacus. Sed id enim ante.</p>
                                    </div>
                                </div><!-- close .news-post -->
                            </li>


                            <li>
                                <div class="news-post">
                                    <div class="scroll-pane">
                                        <div class="aligncenter"><img src="images/portfolio/sample_img_2.png" width="200" height="190" alt="news-image"></div>
                                        <h5>Shorter Sample Title</h5>
                                        <div class="date-stamp"><h6>5/25/2011</h6></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet libero nec risus fermentum eu suscipit mauris sollicitudin. Morbi fringilla mattis velit, consectetur dignissim est tincidunt at.</p>
                                        <p><a href="#">Sample link</a> Nullam tempus tristique porta. Ut eget ante orci, vitae imperdiet magna. Ut elementum felis sed leo viverra sit amet venenatis magna ultrices. Phasellus mattis faucibus dolor convallis scelerisque. Suspendisse ut massa et ante fermentum mattis vel vitae nunc. Nulla varius libero non lorem semper consequat. Integer venenatis, neque sed mattis mollis, mauris velit adipiscing turpis, vel vulputate libero nulla non lacus. Sed id enim ante.</p>
                                    </div>
                                </div><!-- close .news-post -->
                            </li>

                            <li>
                                <div class="news-post">
                                    <div class="scroll-pane">
                                        <div class="aligncenter"><img src="images/portfolio/sample_img_6.png" width="225" height="171" alt="news-image"></div>
                                        <h5>A longer Sample Title that goes onto the second line</h5>
                                        <div class="date-stamp"><h6>5/25/2011</h6></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam laoreet libero nec risus fermentum eu suscipit mauris sollicitudin. Morbi fringilla mattis velit, consectetur dignissim est tincidunt at.</p>
                                        <p><a href="#">Sample link</a> Nullam tempus tristique porta. Ut eget ante orci, vitae imperdiet magna. Ut elementum felis sed leo viverra sit amet venenatis magna ultrices. Phasellus mattis faucibus dolor convallis scelerisque. Suspendisse ut massa et ante fermentum mattis vel vitae nunc. Nulla varius libero non lorem semper consequat. Integer venenatis, neque sed mattis mollis, mauris velit adipiscing turpis, vel vulputate libero nulla non lacus. Sed id enim ante.</p>
                                    </div>
                                </div><!-- close .news-post -->
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                        <a id="previous_link-arrow" class="prev" href="#">&larr; <span>Previous</span></a>
                        <a id="next_link-arrow" class="next" href="#"><span>Next</span> &rarr;</a>
                        <div id="foo2_pag" class="pagination"></div>

                    </div> <!-- end carousel html -->

                    <!-- Begin CAROUSEL JavaScript -->
                    <script type="text/javascript">
                        $(function() {
                            $('#rotating-news').carouFredSel({
                                items: {
                                    visible: 1
                                },
                                circular: false,
                                infinite: false,
                                auto: false,
                                scroll: 1,
                                prev: {
                                    button: "#previous_link-arrow",
                                    key: "left"
                                },
                                next: {
                                    button: "#next_link-arrow",
                                    key: "right"
                                },
                                pagination: ".pagination"

                            });
                        });
                    </script>
                    <script type="text/javascript" src="js/jquery.carouFredSel-4.1.0-packed.js"></script>
                    <!-- END CAROUSEL JavaScript -->

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
                <img src="images/backgrounds/news-background-tall.jpg" alt="background image" />
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