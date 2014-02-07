
// superized document
jQuery(function($) {

    $.supersized({
        // Functionality
        slideshow: 1, // Slideshow on/off
        autoplay: 1, // Slideshow starts playing automatically
        start_slide: 1, // Start slide (0 is random)
        stop_loop: 0, // Pauses slideshow on last slide
        random: 0, // Randomize slide order (Ignores start slide)
        slide_interval: 3000, // Length between transitions
        transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
        transition_speed: 1000, // Speed of transition
        new_window: 1, // Image links open in new window/tab
        pause_hover: 0, // Pause slideshow on hover
        keyboard_nav: 1, // Keyboard navigation on/off
        performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
        image_protect: 1, // Disables image dragging and right click with Javascript

        // Size & Position						   
        min_width: 0, // Min width allowed (in pixels)
        min_height: 0, // Min height allowed (in pixels)
        vertical_center: 1, // Vertically center background
        horizontal_center: 1, // Horizontally center background
        fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
        fit_portrait: 1, // Portrait images will not exceed browser height
        fit_landscape: 0, // Landscape images will not exceed browser width

        // Components							
        slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
        thumb_links: 1, // Individual thumb links for each slide
        thumbnail_navigation: 0, // Thumbnail navigation
        slides: [// Slideshow Images
            {image: 'images/slider_img_1.jpg'},
            {image: 'images/slider_img_2.jpg'},
            {image: 'images/slider_img_3.jpg'},
            {image: 'images/slider_img_4.jpg'},
            {image: 'images/slider_img_5.jpg'},
            {image: 'images/slider_img_6.jpg'}
        ],
        // Theme Options			   
        progress_bar: 1, // Timer for each slide							
        mouse_scrub: 0

    });
});



$(window).load(function() {
    jQuery('.jqueryslidemenu ul > li:last-child a').addClass("background-image", "none");

    if (location.hash != "") {
        $('.intro').fadeOut('slow');
        var href = location.hash;
        var content = $('.dycontent li' + href).html();
        $("li#pgAjaxContainer").html(content);

        if (href == "#pgPortfolio") {
            var script = document.createElement('script');
            script.text = "$(document).ready(function(){	";
            script.text += "var sudoSlider = $('#slider').sudoSlider({ ";
            script.text += "continuous:true, ";
            script.text += "numeric:false, ";
            script.text += "prevNext:true";
            script.text += "}); ";
            script.text += "}); ";
            document.getElementsByTagName('head')[0].appendChild(script);
        }

        $("li#pgAjaxContainer").stop().css("position", "relative").animate({left: "1700px"}, 500, 'easeOutCirc', function() {
            $("li#pgAjaxContainer").css({display: "none"});
            $("li#pgAjaxContainer").css({display: "block", left: "-1700px"}).animate({left: "0px"}, 800, 'easeOutCirc');
        });
    } else {
        $("#container").animate({top: "200px"}, 800, 'easeOutCirc');
    }
});

jQuery(document).ready(function() {
    $('.dycontent').hide();
    $("li#pgAjaxContainer").css("left", "1700px");
    $('.mainmenu li a').live('click', function(e) {
        e.preventDefault();
        $('.mainmenu li a').removeClass("active");
        $(this).addClass("active");
        //$(".intro").css({"display", "none"});	


        var href = $(this).attr("href");

        if (href == location.hash) {
            return;
        } else if (href == "#pgHome") {
            ClosePanel();
        } else {
            $("#container").animate({top: "30px"}, 800, 'easeOutCirc');
            location.hash = href;
            var content = $('.dycontent li' + href).html();
            $("li#pgAjaxContainer").html(content);
            if (href == "#pgPortfolio") {
                var script = document.createElement('script');
                script.text = "$(document).ready(function(){";
                script.text += "var sudoSlider = $('#slider').sudoSlider({ ";
                script.text += "continuous:true, ";
                script.text += "numeric:false, ";
                script.text += "prevNext:true ";
                script.text += "}); ";
                script.text += "jQuery('a.example6').fancybox({ ";
                script.text += "'titlePosition'		: 'outside', ";
                script.text += "'overlayColor'		: '#000', ";
                script.text += "'overlayOpacity'	: 0.9 ";
                script.text += "});";
                script.text += "}); ";
                document.getElementsByTagName('head')[0].appendChild(script);
            } else if (href == "#pgContact") {
                var script = document.createElement('script');
                script.type = "text/javascript";
                script.src = "js/contact.js";
                document.getElementsByTagName('head')[0].appendChild(script);
            }
            if (location.hash == "") {
                $('.intro').fadeOut('slow', function() {
                    $("li#pgAjaxContainer").css({display: "block", left: "-1700px"}).animate({left: "0px"}, 800, 'easeOutCirc');
                });
            } else {
                $('.intro').fadeOut('slow', function() {
                    $("li#pgAjaxContainer").stop().css("position", "relative").animate({left: "1700px"}, 500, 'easeOutCirc', function() {
                        $("li#pgAjaxContainer").css({display: "none"});
                        $("li#pgAjaxContainer").css({display: "block", left: "-1700px"}).animate({left: "0px"}, 800, 'easeOutCirc');
                    });
                });
            }

        }

    });

    $('.logo a').live('click', function(e) {
        e.preventDefault();
        ClosePanel();

    });

    $('.close_panel').live('click', function(e) {
        ClosePanel();

    });

    function ClosePanel() {
        $('.mainmenu li a').removeClass("active");
        location.hash = "";
        $("li#pgAjaxContainer").stop().animate({left: '2000px'}, 500, 'easeOutCirc', function() {
            $("li#pgAjaxContainer").css({'display': 'none3'});
            $("#container").animate({top: "200px"}, 600, 'easeOutCirc');
            $('.intro').fadeIn('slow');
        });
    }
});