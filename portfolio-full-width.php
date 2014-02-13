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
							<li class="current">
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
							<li class="sliding-element">
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
		
		
		<div class="content-container light-fonts">
			<div class="content-heading right-align">
				<h3>Latest</h3>
				<h1>Projects</h1>
			</div>
			

		</div><!-- close #content-container -->
		
		
		
		
		
		<!-- Background Slides -->
		<div id="featured"> 
			<a href="images/portfolio/img_8.jpg" class="fancylightbox"><img src="images/portfolio/img_1-tall.jpg" alt="portfolio item" /></a>
			<a href="images/portfolio/img_6.jpg" class="fancylightbox"><img src="images/portfolio/img_2-tall.jpg" alt="portfolio item" /></a>
			<a href="images/portfolio/img_3.jpg" class="fancylightbox"><img src="images/portfolio/img_7-tall.jpg" alt="portfolio item" /></a>
			<a href="images/portfolio/img_5.jpg" class="fancylightbox"><img src="images/portfolio/img_3-tall.jpg" alt="portfolio item" /></a>
			<a href="images/portfolio/img_1.jpg" class="fancylightbox"><img src="images/portfolio/img_8-tall.jpg" alt="portfolio item" /></a>
		</div><!-- close #featured -->
		<script type="text/javascript">
		     $(window).load(function() {
		         $('#featured').orbit({
				     animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
				     animationSpeed: 1200,                // how fast animtions are
				     timer: true, 			 // true or false to have the timer
				     advanceSpeed: 6000, 		 // if timer is enabled, time between transitions 
				     pauseOnHover: false, 		 // if you hover pauses the slider
				     startClockOnMouseOut: false, 	 // if clock should start on MouseOut
				     startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
				     directionalNav: false, 		 // manual advancing directional navs
				     captions: true, 			 // do you want captions?
				     captionAnimation: 'fade', 		 // fade, slideOpen, none
				     captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
				     bullets: true,			 // true or false to activate the bullet navigation
				     bulletThumbs: false,		 // thumbnails for the bullets
				     bulletThumbLocation: '',		 // location from this file where thumbs will be
				     afterSlideChange: function(){} 	 // empty function 
				});
		     });
		</script>
		<!-- End Background Slides -->
		
		
		
	</div><!-- close #container -->
	
	
<?php include("footer.php"); ?>	