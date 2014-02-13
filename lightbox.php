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
							<li class="current">
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
		
		
		<div class="content-container">
			<div class="content-heading right-align">
				<h5>Focus on</h5>
				<h1>Web &amp; Design</h1>
			</div>
			<ul class="sub-navigation right-align">
				<li><a href="company.php">About Us</a></li>
				<li><a href="typography.php">Typography</a></li>
				<li><a href="columns.php">Columns</a></li>
				<li class="current"><a href="lightbox.php">Lightbox Examples</a></li>
			</ul>
			
			
			<div class="scroll-pane" style="height:370px;"><!-- customize the height for the scroll box -->
				
				
					<div class="col_1_2">
						<h5>Image lightbox</h5>
						<a href="images/portfolio/lightbox.jpg" class="fancylightbox" title="Title can be filled in or removed easily"><img src="images/portfolio/lightbox-thumbnail.jpg"  alt="Image Lightbox"  /></a>
					</div>  
					<div class="col_2_2">
						<h5>Video lightbox</h5>
						<a href="http://player.vimeo.com/video/18720171?portrait=0" class="videolightbox"><img src="images/portfolio/video-thumnail.jpg" alt="Video Lightbox"  /></a>
					</div>
					<div class="clear"></div>
				
				
				<div class="divider"></div>
				
				
				<h5>Image Alignment</h5>
				<p><a href="images/portfolio/photo-right.jpg" class="fancylightbox"><img class="alignright" src="images/photo-right.jpg" alt="" width="140" height="103" /></a>Ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dolor, semper eu commodo consectetur, porttitor ac tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla non quam dui, in bibendum tortor. <a href="#">Example link</a></p>
				<p>Nunc at tristique diam. Suspendisse potenti. Duis vel metus lacus, nec adipiscing ipsum. In eget urna est. Nulla faucibus cursus dui non suscipit. Nunc quam odio, consectetur at condimentum sit amet, accumsan sit amet quam. Etiam eu purus nibh. Praesent et nunc sed metus imperdiet dignissim.</p>
				<p><a href="images/portfolio/photo-left.jpg" class="fancylightbox"><img src="images/photo-left.jpg" alt="" width="140" height="103" class="alignleft" /></a>Cras sit amet quam mauris. Suspendisse ac purus sed leo tincidunt imperdiet. Integer pulvinar nunc eu eros porta eget sodales nulla imperdiet. Nam semper scelerisque viverra. Sed vitae egestas metus. </p>
				<p>Praesent vel enim est, eu ornare metus. Suspendisse sit amet nisi nunc. Quisque eget justo justo, in iaculis diam. Sed elementum mauris ac urna pharetra sollicitudin. Mauris ut faucibus turpis. Etiam mollis facilisis ligula vitae iaculis. Curabitur eget orci at turpis auctor scelerisque. Donec eget sapien felis. Phasellus ornare tincidunt sem non blandit. Cras turpis odio, porta ut molestie vitae, lacinia vel lacus.</p>
				
				
				<div class="divider"></div>
				
				
				<h5>Transparency Hover &amp; Aligned Center</h5><br/>
				<div class="aligncenter"><a href="images/portfolio/photo-center.jpg" class="fancylightbox"><img src="images/portfolio/photo-center-thumbnail.jpg" alt="Transparency Image" width="300" height="200" class="transparent" /></a></div>
				
				<p>Praesent vel enim est, eu ornare metus. Suspendisse sit amet nisi nunc. Quisque eget justo justo, in iaculis diam. Sed elementum mauris ac urna pharetra sollicitudin.</p>
				
				
				
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
			<img src="images/backgrounds/company-background.jpg" alt="background image" />
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