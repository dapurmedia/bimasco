<<<<<<< HEAD
//Lightbox Code
$(document).ready(function() { 
	$("a.fancylightbox").fancybox({
		'titleShow'     : true,
		'titlePosition'	: 'over',
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade',
		'overlayOpacity': '0.5',
		'overlayColor'  :  '#333'
	});
	$("a[rel=portfolio]").fancybox({
		'titleShow'     : true,
		'titlePosition'	: 'over',
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'overlayOpacity': '0.5',
		'overlayColor'  :  '#333'
	});
	$(".videolightbox").fancybox({
		'titleShow'     : false,
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'type'				: 'iframe',
		'overlayOpacity': '0.5',
		'overlayColor'  :  '#333'
	});
	$(".buttonvideolightbox").fancybox({
		'titleShow'     : false,
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'type'				: 'iframe',
		'overlayOpacity': '0.5',
		'overlayColor'  :  '#333'
	});
	$(".iframe-popup").fancybox({
			'width'				: '75%',
			'height'			: '75%',
	        'autoScale'     	: false,
	        'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});
});

//Transparency Adjustments
$(document).ready(function() {  
            $('.transparent').each(function() {
                $(this).hover(
                    function() {
                        $(this).stop().animate({ opacity: 0.6 }, 400);
                    },
                   function() {
                       $(this).stop().animate({ opacity: 1.0 }, 400);
                   })
                });
=======

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
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
});



<<<<<<< HEAD
//View/Hide Menu
$(document).ready(function() { 
    $(".sf-menu").hide();
    $(".hover-box").hoverIntent( 
        function(){ 
			$(".sf-menu").stop(true, true).slideDown('medium'); 
		},
        function(){ 
			$(".sf-menu").slideUp('medium'); 
		}
    );
});


//Hover Menu
$(document).ready(function()
{
	slide(".sf-menu", 7, 0, 150, .8);
});

function slide(navigation_id, pad_out, pad_in, time, multiplier)
{
	// creates the target paths
	var list_elements = navigation_id + " li.sliding-element";
	var link_elements = list_elements + " a";
	
	// initiates the timer used for the sliding animation
	var timer = 0;
	
	// creates the slide animation for all list elements 
	$(list_elements).each(function(i)
	{
		// margin left = - ([width of element] + [total vertical padding of element])
		$(this).css("margin-left","-180px");
		// updates timer
		timer = (timer*multiplier + time);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
	});

	// creates the hover-slide effect for all link elements 		
	$(link_elements).each(function(i)
	{
		$(this).hover(
		function()
		{
			$(this).animate({ paddingLeft: pad_out }, 150);
		},		
		function()
		{
			$(this).animate({ paddingLeft: pad_in }, 150);
		});
	});
}




//IE7 Z-Index Fix
$(document).ready(function() {
    if ($.browser.msie && parseInt($.browser.version) == 7) {
        var zIndexNumber = 1000;

        $('div').each(function() {
            $(this).css('zIndex', zIndexNumber);
            zIndexNumber -= 10;
        });
    }
});




//Full Screen Background Image Load
$(window).load(function() {    

        var theWindow        = $(window),
            $bg              = $("#bg"),
            aspectRatio      = $bg.width() / $bg.height();

        function resizeBg() {

                if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                    $bg
                        .removeClass()
                        .addClass('bgheight');
                } else {
                    $bg
                        .removeClass()
                        .addClass('bgwidth');
                }

        }

        theWindow.resize(function() {
                resizeBg();
        }).trigger("resize");

});

=======
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
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
