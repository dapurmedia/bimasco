<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Bimasco Cargo System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css" media="all" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script><!-- Various Custom JavaScript including Lightbox Settings --> 
        <script type="text/javascript" src="js/jquery.fancybox.js"></script><!-- Lightbox JavaScript --> 
        <!--<script type="text/javascript" src="admin/bootstrap/js/jquery-1.10.2.min.js"></script>-->

        <!-- Drop-Down Menu JavaScript --> 
        <script type="text/javascript" src="js/hoverIntent.js"></script>
        <script type="text/javascript" src="js/superfish.js"></script>

        <!-- Featured Slider JavaScript and CSS --> 
        <script src="js/jquery.orbit-1.2.3.min.js" type="text/javascript"></script>
        <!--<script type="text/javascript" src="js/sidebar.js"></script>-->
<!--        <script type="text/javascript" src="js/mootools.js"></script>-->

        <script type="text/javascript">
            $(document).ready(function() {
                var pageTitle = document.title; //HTML page title
                var pageUrl = location.href; //Location of the page


                //user hovers on the share button	
                $('#share-wrapper li').hover(function() {
                    var hoverEl = $(this); //get element

                    //browsers with width > 699 get button slide effect
                    if ($(window).width() > 699) {
                        if (hoverEl.hasClass('visible')) {
                            hoverEl.animate({"margin-left": "-117px"}, "fast").removeClass('visible');
                        } else {
                            hoverEl.animate({"margin-left": "0px"}, "fast").addClass('visible');
                        }
                    }
                });

                //user clicks on a share button
                $('.button-wrap').click(function(event) {
                    var shareName = $(this).attr('class').split(' ')[0]; //get the first class name of clicked element

                    switch (shareName) //switch to different links based on different social name
                    {
                        case 'facebook':
                            var openLink = window.open("weather.php", "", "width=475,height=273");
                            break;
                        case 'twitter':
                            var openLink = window.open("kurs.php", "", "width=400,height=275");
                            break;
                        case 'digg':
                            var openLink = window.open("", "", "width=500,height=250");
                            break;
                        case 'stumbleupon':
                            var openLink = window.open("", "", "width=400,height=275");
                            break;
                    }

                    //Parameters for the Popup window
                    winWidth = 650;
                    winHeight = 450;
                    winLeft = ($(window).width() - winWidth) / 2,
                            winTop = ($(window).height() - winHeight) / 2,
                            winOptions = 'width=' + winWidth + ',height=' + winHeight + ',top=' + winTop + ',left=' + winLeft;

                    //open Popup window and redirect user to share website.
                    window.open(openLink, 'Share This Link', winOptions);
                    return false;
                });
            });
        </script>
    </head>
    <body>