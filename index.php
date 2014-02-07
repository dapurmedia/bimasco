<?php
include './connect/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bimasco Cargo System</title>
        <?php include './header.php'; ?>


        <script type="text/javascript">
            $(document).ready(function() {
                $('.fancybox').fancybox();

                // Set custom style, close if clicked, change title type and overlay color
                $(".fancybox-effects-c").fancybox({
                    wrapCSS: 'fancybox-custom',
                    closeClick: true,
                    openEffect: 'none',
                    helpers: {
                        title: {
                            type: 'inside'
                        },
                        overlay: {
                            css: {
                                'background': 'rgba(238,238,238,0.85)'
                            }
                        }
                    }
                });
            });
        </script>
        <style type="text/css">
            .fancybox-custom .fancybox-skin {
                box-shadow: 0 0 50px #222;
            }
        </style>
    </head>

    <body>
        <!-- background slider Start -->
        <div id="controls-wrapper" class="load-item">
            <ul id="slide-list"> </ul>
        </div>
        <!-- background slider end -->
        <div class="contact_info"><h3>+1 (703)(438) 2000</h3></div>
        <!-- container start -->
        <section id="container">
            <header class="top_section">
                <div class="logo"><h1><a href="#">Bimasco Cargo System</a></h1></div>
                <nav id="menu">
                    <div id="myslidemenu" class="jqueryslidemenu">
                        <ul class="mainmenu">
                            <li><a href="#pgAbout" url="about.html">About Us</a></li>
                            <li><a href="#pgPortfolio" url="portfolio.html">Gallery</a></li>
                            <li><a href="#pgServices" url="services.html">Services</a></li>
                            <!--<li><a href="#pgPrices" url="prices.html">Prices</a></li>-->
                            <li><a href="#pgClient" url="client.html">Client</a></li>
                            <li><a href="#pgContact" url="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div class="clear"></div>
            <div class="intro"> 
                <h2>Welcome to <span>
                        <?php
                        $query_beranda = mysql_query("SELECT * FROM beranda");
                        $data = mysql_fetch_array($query_beranda);
                        echo $data['judul'];
                        ?></span></h2>
                <h5><?php echo $data['isi']; ?></h5>
            </div>

            <article id="content">
                <ul>
                    <li id="pgAjaxContainer"> </li>
                    <li id="pgAjaxContainer_home"> </li>   
                </ul>
            </article>

        </section>
        <!-- container end -->

        <div class="dycontent">
            <!-- About content Start -->
            <ul>
                <li id="pgAbout">
                    <div class="close_panel"></div>
                    <section class="content">
                        <div class="one_half_las">
                            <?php
                            $query_aboutus = mysql_query("SELECT * FROM tentang");
                            $data = mysql_fetch_array($query_aboutus);
                            ?>
                            <h2><?php echo $data['judul_tentang']; ?></h2>
                            <!--<img src="images/about_img_1.png" alt="img" class="space" />-->
                            <p><?php echo $data['isi_tentang']; ?></p>
                        </div>

                        <!--                        <div class="one_half_last">
                                                    <h2>ABOUT US</h2>
                                                    <p><strong>Etiam porttitor dapibus turpis a congue. 
                                                            Sed justo ante, accumsan non laoreet in, molestie vitae sapien.
                                                            Vivamus massa sem, vulputate at auctor at, volutpat non sem. 
                                                            Donec ultrices sodales scelerisque.</strong></p>
                                                    <p>Habitasse platea dictumst. Aliquam in est leo. Aliquam ut 
                                                        urna pulvinar ipsum ultricies fringilla et sed magna. Duis faucibus 
                                                        lorem at eros cursus fermentum. Vivamus a nisl vel magna tincidunt sodales 
                                                        ac imperdiet arcu. Proin blandit cursus blandit. Etiam porttitor dapibus 
                                                        turpis a congue. Sed justo ante, accumsan non laoreet in, molestie vitae 
                                                        sapien. Vivamus massa sem, vulputate at auctor at, volutpat non sem. 
                                                        Donec ultrices sodales scelerisque. Maecenas egestas lacus a risus 
                                                        suscipit dapibus.</p>                
                                                </div>-->
                    </section>
                </li>
                <!-- About content end -->


                <!-- Portfolio content Start -->
                <li id="pgPortfolio">
                    <div class="close_panel"></div>

                    <section class="content">
                        <h2>GALLERY</h2>            
                        <div id="slider">
                            <ul>
                                <li>
                                    <div class="one_third">
                                        <a href="images/portfolio_big_img_1.png" class="fancybox-effects-c" title="This is a image Description" ><img src="images/portfolio_img_1.png" alt="img" /></a>
                                    </div>
                                    <div class="one_third">
                                        <a href="images/portfolio_big_img_2.png" class="lightbox" title="This is a image Description"><img src="images/portfolio_img_2.png" alt="img" /></a>
                                    </div>
                                    <div class="one_third_last">
                                        <a href="images/portfolio_big_img_3.png" class="lightbox" title="This is a image Description"><img src="images/portfolio_img_3.png" alt="img" /></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="one_third">
                                        <a href="images/portfolio_img_4.png" class="lightbox"><img src="images/portfolio_img_4.png" alt="img" /></a>
                                    </div>
                                    <div class="one_third">
                                        <a href="images/portfolio_big_img_5.png" class="lightbox"><img src="images/portfolio_img_5.png" alt="img" /></a>
                                    </div>
                                    <div class="one_third_last">
                                        <a href="images/portfolio_big_img_6.png" class="lightbox"><img src="images/portfolio_img_6.png" alt="img" /></a>
                                    </div>
                                </li>	
                            </ul>
                        </div>
                    </section>
                </li>
                <!-- Portfolio content end -->

                <!-- Services content Start -->
                <li id="pgServices">
                    <div class="close_panel"></div>
                    <section class="content">            
                        <h2>SERVICES</h2>
                        <div class="one_third" id="space">
                            <img src="images/services_img_1.png" alt="img" class="space" />
                            <p>Duis faucibus lorem at eros cursus fermentum. Vivamus a nisl vel magna tincidunt sodales 
                                ac imperdiet arcu. Proin blandit cursus blandit. Etiam porttitor.Morbi laoreet mauris nulla, nec lacinia tellus. 
                            </p>
                        </div>
                        <div class="one_third" id="space">
                            <img src="images/services_img_2.png" alt="img" class="space" />
                            <p>Proin faucibus lorem at eros cursus fermentum. Vivamus a nisl vel magna tincidunt sodales 
                                ac imperdiet arcu. Proin blandit cursus blandit. Etiam porttitor.Morbi laoreet mauris nulla, nec lacinia magnas. 
                            </p>

                        </div>
                        <div class="one_third_last" id="space">
                            <img src="images/services_img_3.png" alt="img" class="space" />
                            <p>Fermentum faucibus lorem at eros cursus mentum. Vivamus a nisl vel magna tincidunt sodales 
                                ac imperdiet arcu. Proin blandit cursus blandit. Etiam porttitor.Morbi laoreet mauris nulla, nec lacinia cursus. 
                            </p>
                        </div>
                    </section>

                </li>
                <!-- Services content end -->  

                <!-- pgPrices content Start -->
                <li id="pgPrices">
                    <div class="close_panel"></div>
                    <section class="content">
                        <div class="one_half" id="space">
                            <h2>WE RECOMMENDED</h2>
                            <img src="images/prices_img_1.png" alt="img" class="space" />
                            <p>Aenean tristique cursus lorem, eu molestie magna molestie 
                                iaculis. Cras nec leo odio. Suspendisse non risus ligula, eget 
                                vestibulum dui. Curabitur sodales aliquet nisl a cursus. Curabitur mauris purus.</p>
                        </div>

                        <div class="one_half_last" id="space">
                            <h2>PRICES</h2>
                            <table class="price_table" width="100%">
                                <tr>
                                    <th width="70%">Service</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td width="70%">Aliquam ut urna pulvinar ipsum</td>
                                    <td>$15</td>
                                </tr>
                                <tr>
                                    <td width="70%">Fringilla et sed magna du</td>
                                    <td>$25</td>
                                </tr>
                                <tr>
                                    <td width="70%">Tincidunt sodales ac imperdiet</td>
                                    <td>$21</td>
                                </tr>
                                <tr>
                                    <td width="70%">Sodales ivamus massa sem putate</td>
                                    <td>$14</td>
                                </tr>

                                <tr>
                                    <td width="70%">Fringilla et sed magna du</td>
                                    <td>$25</td>
                                </tr>
                            </table>
                        </div>
                    </section>
                </li>
                <!-- pgPrices content end -->

                <!-- pgClient content Start -->
                <li id="pgClient">
                    <div class="close_panel"></div>
                    <section class="content">
                        <div class="one_half">
                            <h2>CLIENTS</h2>
                            <div class="one_half">
                                <img src="images/client_img_1.png" alt="img" />
                            </div>
                            <div class="one_half_last">
                                <img src="images/client_img_2.png" alt="img" />
                            </div>

                            <div class="one_half">
                                <img src="images/client_img_3.png" alt="img" />
                            </div>
                            <div class="one_half_last">
                                <img src="images/client_img_4.png" alt="img" />
                            </div>
                        </div>

                        <div class="one_half_last">
                            <h2>MEMBERSHIP</h2>
                            <p><strong>Proin blandit cursus blandit. Etiam porttitor dapibus turpis a congue. 
                                    Sed justo ante, accumsan non laoreet in, molestie vitae sapien.</strong></p>
                            <p>Vivamus massa sem, vulputate at auctor at, volutpat non sem. 
                                Donec ultrices sodales scelerisque. Maecenas egestas lacus a risus 
                                suscipit dapibus.In hac habitasse platea dictumst. Aliquam in est leo. 
                                Aliquam ut urna pulvinar ipsum ultricies fringilla et sed magna. Duis 
                                faucibus lorem at eros cursus fermentum. Vivamus a nisl vel magna tincidunt 
                                sodales ac imperdiet arcu. Proin blandit cursus blandit. Etiam porttitor 
                                apibus turpis a congue. Sed justo ante, accumsan non laoreet in, molestie 
                                vitae sapien. Vivamus massa sem, vulputate at auctor at, volutpat non 
                                sem. Donec ultrices sodales scelerisque.</p>
                        </div>

                    </section>
                </li>
                <!-- pgClient content end -->

                <!-- pgContact content Start -->
                <li id="pgContact">
                    <div class="close_panel"></div>            
                    <section class="content">
                        <div class="one_half">
                            <h4>Our Office</h4>
                            <iframe width="425" height="235" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Jl.+Perak+Barat+133+Surabaya+60177+Indonesia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=41.411029,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Jalan+Ikan+Dorang,+Krembangan,+Surabaya,+Jawa+Timur+60177,+Indonesia&amp;t=m&amp;ll=-7.223184,112.729254&amp;spn=0.012772,0.036564&amp;z=14&amp;output=embed"></iframe>

                            <span class="view_address">
                                <?php
                                $query_kontak = mysql_query("SELECT * FROM kontak WHERE jenis_kantor = 'Head Office'");
                                $data = mysql_fetch_array($query_kontak);
                                ?>
                                <span><strong>(<?php echo $data['jenis_kantor']; ?>)</strong> <?php echo $data['nama_afiliasi']; ?> <?php echo $data['kota']; ?> </span>
                                <span>Address: <?php echo $data['alamat']; ?></span>
                                <span>Telephone: <?php echo $data['telepon']; ?> </span>
                                <span>FAX: <?php echo $data['fax']; ?></span>
                                <span>E-mail: <a href="mailto: <?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></span>
                            </span>
                        </div>

                        <div class="one_half_last">               
                            <form method="post" action="sendEmail.php" name="contact-form" id="contact-form">	
                                <div id="main">
                                    <div id="response"></div>
                                    <label for="name">Name:</label>
                                    <p><input type="text" name="name" id="name" size="30" /></p>

                                    <label for="email">Email:</label>
                                    <p><input type="text" name="email" id="email" size="30" /></p>

                                    <label for="web">Subject:</label>
                                    <p><input type="text" name="subject" id="subject" size="30" /></p>

                                    <label for="message">Message:</label>
                                    <p><textarea name="message" id="message" cols="30" rows="4"></textarea></p>

                                    <p><input  class="contact_button button" type="submit" name="submit" id="submit" value="Email Us!" /></p>
                                </div>

                            </form>
                        </div>

                    </section>

                </li>
                <!-- pgContact content end -->
            </ul>
            <!-- end dynamic pages ul tag -->
        </div>
    </body>
</html>