<?php
include ("./connect/connection.php");
include("header.php");
$query = mysql_query("SELECT * FROM kontak ORDER BY jenis_kantor ASC");
?>

<!-- FULL BACKGROUND IMAGE -->

<div id="box-container">
    <div id="page-wrap">

        <div id="container">

            <div id="left-container">

                <?php include './menu.php'; ?>
                <div class="side-barheading center-align">
                    <h2>Our Office</h2>
                    <h5>Head &amp; Brance</h5>
                </div>
            </div>
            <div class="content-container">
                <div class="content-heading right-align">
                    <h1>Our Office</h1>
                </div>
                <div class="scroll-pane" style="height:400px;">
                    <?php $no = 1; ?>
                    <div class="list_carousel">
                        <ul id="rotating-services">
                            <?php while ($dataKontak = mysql_fetch_array($query)) {
                                ?>
                                <li class="scroll-pane">
                                    <h5><span><?php echo $no . "."; ?></span> <?php echo $dataKontak['nama_afiliasi']; ?> (<?php echo $dataKontak['jenis_kantor']; ?>)</h5>
                                    <strong><?php echo $dataKontak['kota']; ?></strong><br/>
                                    <p><?php echo $dataKontak['alamat']; ?></p>
                                    <p><?php echo $dataKontak['telepon']; ?></p>
                                    <p><?php echo $dataKontak['fax']; ?></p>
                                    <p><a href="mailto: <?php echo $dataKontak['email']; ?>"><?php echo $dataKontak['email']; ?></a></p>
                                    <p><?php echo $dataKontak['pic']; ?> </p>
                                    <p><?php echo $dataKontak['hp']; ?> </p>
                                </li>
                                <?php
                                $no++;
                            }
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                        <a id="previous_link" class="prev" href="#">&larr; <span>Previous</span></a>
                        <a id="next_link" class="next" href="#"><span>Next</span> &rarr;</a>
                        <div id="foo2_pag" class="pagination"></div>

                    </div> <!-- end carousel html -->

                    <!-- Begin CAROUSEL JavaScript -->
                    <script type="text/javascript">
                        $(function() {
                            $('#rotating-services').carouFredSel({
                                items: {
                                    visible: 1
                                },
                                circular: false,
                                infinite: false,
                                auto: false,
                                scroll: 1,
                                prev: {
                                    button: "#previous_link",
                                    key: "left"
                                },
                                next: {
                                    button: "#next_link",
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
                <img src="images/backgrounds/services-background-tall.jpg" alt="background image" />
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