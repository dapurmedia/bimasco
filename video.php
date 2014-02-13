<?php include("header.php"); ?>
<!-- FULL BACKGROUND IMAGE -->
<img src="images/background-dark.jpg" id="bg" alt="background">

<div id="box-container">
<div id="page-wrap">
	
	<div id="container">
		
		<div id="left-container">
			
			<div class="bottom-box">
				<div class="logo-menu">
					<a href="index.php"><img src="images/logo-space.png" alt="logo"></a>
				</div><!-- close .logo-menu -->
			</div><!-- close .top-box or .bottom-box -->
			
			<div class="side-barheading center-align">
				
			</div>
			
			<div class="top-box">
				<div class="navigation-menu">
					<div class="hover-box">
						
						<h1>Menu</h1>
						
						<ul class="sf-menu sf-vertical">
							<li class="sliding-element">
								<a href="index.php">Home</a>
							</li>
							<li class="sliding-element">
								<a href="company.php">Company</a>
							</li>
							<li class="sliding-element">
								<a href="services.php">Our Services</a>
							</li>
							<li class="sliding-element">
								<a href="portfolio.php">Portfolio</a>
								<ul>
									<li class="sliding-element">
										<a href="portfolio-thumbnails.php">Thumbnails</a>
									</li>
									<li class="sliding-element">
										<a href="portfolio.php">Scrolling Portfolio</a>
									</li>
									<li class="sliding-element">
										<a href="portfolio-gallery.php">Image Gallery</a>
									</li>
									<li class="sliding-element">
										<a href="portfolio-full-width.php">Full-width</a>
									</li>
								</ul>
							</li>
							<li class="sliding-element">
								<a href="blog.php">Blog</a>
							</li>
							<li class="current">
								<a href="video.php">Video Example</a>
							</li>
							<li class="sliding-element">
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
												
						<div class="navigation-space">&nbsp;</div>
						
					</div><!-- close .hover-box -->
				</div><!-- close .navigation-menu -->
			</div><!-- close .top-box or .bottom-box -->
			

			
		</div><!-- close #left-container -->
		
		
		<!--div class="content-container light-fonts">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nec tellus ligula. Nullam elit metus, dapibus vitae pharetra vitae, tincidunt a sapien. Sed eget sapien et justo ultrices auctor. Aliquam sagittis, nibh in <a href="#">dictum elementum</a>.</p>

		</div--><!-- close #content-container -->
		
		
		
		<!-- Background Slides -->
		<div id="featured"> 
			<div>
				<iframe src="http://player.vimeo.com/video/22884674?byline=0&amp;portrait=0" width="980" height="600"></iframe>
			</div>
		</div><!-- close #featured -->
		<script type="text/javascript">
		     $(window).load(function() {
		         $('#featured').orbit({
				     animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
				     animationSpeed: 1200,                // how fast animtions are
				     timer: true, 			 // true or false to have the timer
				     advanceSpeed: 4000, 		 // if timer is enabled, time between transitions 
				     pauseOnHover: false, 		 // if you hover pauses the slider
				     startClockOnMouseOut: false, 	 // if clock should start on MouseOut
				     startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
				     directionalNav: false, 		 // manual advancing directional navs
				     captions: true, 			 // do you want captions?
				     captionAnimation: 'fade', 		 // fade, slideOpen, none
				     captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
				     bullets: false,			 // true or false to activate the bullet navigation
				     bulletThumbs: false,		 // thumbnails for the bullets
				     bulletThumbLocation: '',		 // location from this file where thumbs will be
				     afterSlideChange: function(){} 	 // empty function 
				});
		     });
		</script>
		<!-- End Background Slides -->
		
		
		
	</div><!-- close #container -->
	
	
<?php include("footer.php"); ?>	