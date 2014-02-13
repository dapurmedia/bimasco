<?php
include("header.php");
include ("./connect/connection.php");
$query = mysql_query("SELECT * FROM kontak WHERE jenis_kantor = 'Head Office'");
$rows = mysql_fetch_array($query);

//If the form is submitted
if (isset($_POST['submit'])) {
    $comments = $_POST['message'];
    //Check to make sure that the name field is not empty
    if (trim($_POST['contactname']) == '') {
        $hasError = true;
    } else {
        $name = trim($_POST['contactname']);
    }
    //Check to make sure sure that a valid email address is submitted
    if (trim($_POST['email']) == '') {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    //If there is no error, send the email
    if (!isset($hasError)) {
        $emailTo = 'mike@progressionstudios.com'; //Put your own email address here
        $body = "Name: $name \n\nEmail: $email \n\nComments:\n $comments";
        $headers = 'From: My Site <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, 'Your Website Subject', $body, $headers); //Replace Your Website Subject
        $emailSent = true;
    }
}
?>

<!-- FULL BACKGROUND IMAGE -->

<div id="box-container">
    <div id="page-wrap">

        <div id="container">

            <div id="left-container">
                <?php include './menu.php'; ?>
                <div class="side-barheading center-align">
                    <h1 class="light-fonts">Contact Us</h1>
                </div>
            </div>

            <div class="content-container light-fonts">
                <div class="scroll-pane" style="height:500px;">
                    <iframe width="575" height="205" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=Jl.+Perak+Barat+133+Surabaya+60177+Indonesia&amp;daddr=&amp;hl=en&amp;geocode=&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=41.411029,86.572266&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=-7.227653,112.726877&amp;spn=0.006295,0.006346&amp;output=embed"></iframe>
                    <div class="col_2_2">
                        <div class="contact-details">
                            <em><p><?php echo $rows['nama_afiliasi']; ?><br/> (<?php echo $rows['jenis_kantor']; ?>)<br/>
                                    <?php echo $rows['kota']; ?><br/>
                                    <?php echo $rows['alamat']; ?>
                                </p>
                                <p>Tel. <?php echo $rows['telepon']; ?><br/>
                                    Fax. <?php echo $rows['fax']; ?></p>
                                <p><a href="mailto: <?php echo $rows['email']; ?>"><?php echo $rows['email']; ?></a></p></em>
                        </div><!-- close .contact-details -->
                    </div>

                    <div class="col_2_2">
                        <div class="contact-form">
                            <script src="js/jquery.validate.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#contactform").validate();
                                });
                            </script>
                            <div id="contact-wrapper">	
                                <?php if (isset($hasError)) { //If errors are found ?>
                                    <p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
                                <?php } ?>

                                <?php if (isset($emailSent) && $emailSent == true) { //If email is sent ?>
                                    <p class="success"><strong>Email Successfully Sent!</strong></p>
                                <?php } ?>

                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
                                    <h5>Send A Message</h5>
                                    <div>
                                        <input type="text" size="45" name="contactname" id="contactname" placeholder="Name" value="" class="required" />
                                    </div>

                                    <div>
                                        <input type="email" size="45" name="email" id="email" placeholder="Email" value="" class="required email" />
                                    </div>

                                    <div>
                                        <textarea rows="5" cols="45" name="message" id="message"></textarea>
                                    </div>
                                    <input type="submit" class="submit-form" value="Send E-mail &rsaquo;" name="submit" />
                                </form>
                            </div><!-- close #contact-wrapper -->
                        </div><!-- close .contact-form -->
                    </div>

                    <div class="clear"></div>

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
                <img src="images/backgrounds/contact-background-tall.jpg" alt="background image" />
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