<<<<<<< HEAD
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
=======
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="require freight forwarding, customs clearance, transportation, warehousing, 
      distribution, or project cargo shipments">
<meta name="keywords" content="cargo, export, import, export import, cargo surabaya, transportation, warehousing,
      cargo shipments, freight forwarding, distribution">
<meta name="author" content="DapurMedia">

<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/layout.css"/>
<link rel="stylesheet" type="text/css" href="css/supersized.css"/>
<link rel="stylesheet" type="text/css" href="css/supersized.shutter.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/jqueryslidemenu.css"/>

<link href="css/sudo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript" src="js/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.5" media="screen" />


<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/supersized.3.2.7.js"></script>
<script type="text/javascript" src="js/supersized.shutter.js"></script>
<script type="text/javascript" src="js/jqueryslidemenu.js"></script>
<script type="text/javascript" src="js/jquery.sudoSlider.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

        <!-- <script type="text/javascript" src="js/contact.js"></script>  -->
<script type="text/javascript" src="css/fancybox/jquery.fancybox-1.3.4.js"></script>

<!--[if lt IE 9]>
<script src="../../../../html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='../../../../fonts.googleapis.com/css@family=Oswald_3A300,400,500,700' rel='stylesheet' type='text/css' />
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
