 <!DOCTYPE html>
<html>
	<head>
	
		<title>Server Side Website</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="includes/bootstrap.min.css">
		<link rel="stylesheet" href="includes/style.css">
		
	</head>
	<body>
		
		<?php include("includes/nav.html"); include("includes/query.php"); ?>
		
		<div id="section1">
			<header id="header-area" class="intro-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="header-content">
								<h1>Energy Fitness Center</h1>
								<h4></h4>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<div id="section2">
			<!-- Start Membership Area -->
			<section id="feature-area" class="about-section">
				<div class="container">
					<div class="row text-center inner">
						<div class="col-sm-4">
							<div class="feature-content">
								<img src="img/1-1.1.jpg" alt="Image">
								<h2 class="feature-content-title green-text">Student</h2>
								<p class="feature-content-description">Try one of these. To get into shape. Get your kids off the sofa. Relieve your stress, recharge your energy, or remember the fun of playing team sports. To swim laps in our giant competition pool or go with the flow in our lazy river. 
								</p>
								<a href="membership.php" class="feature-content-link green-btn">See Details</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="feature-content">
								<img src="img/1-2.1.jpg" alt="Image">
								<h2 class="feature-content-title blue-text">Platinum</h2>
								<p class="feature-content-description"> To learn a new sport. Lose a few pounds. Take a class with a friend. And take advantage of the unmatched fitness and recreation opportunities right under your nose.</p>                    
								<a href="membership.php" class="feature-content-link blue-btn">See Details</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="feature-content">
								<img src="img/1-3.1.jpg" alt="Image">
								<h2 class="feature-content-title red-text">Gold</h2>
								<p class="feature-content-description">In an attempt to enhance customer service for UW-Eau Claire students, faculty/staff, and student/faculty/staff spouses, University Recreation & Sport Facilities is offering the option of dual memberships for Crest Fitness Center and the McPhee Strength & Performance Center. 
								</p>
								<a href="membership.php" class="feature-content-link red-btn">See Details</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Membership Area -->
			
		</div>
		<div id="section3">
			<!-- Start Classes Area -->
			<section id="services-area" class="services-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center inner our-service">
							<div class="service">
								<h1>Our Services</h1>
								<p>Energy Fitness Club offers a complete training experience with premium weight- <br/>
								and circuit-training equipment, flat panel televisions on each piece of cardio <br/>
								and experienced certified personal trainers to help you meet your fitness goals.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Services Area -->
		
			<section id="testimornial-area">
				<div class="container">
					<div class="row text-center">
						<!-- Start Classes Area -->
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/yoga.jpg" alt="Image">
								<h2>Yoga</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="class.php" class="content-link">details</a>
								<br>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/spin.jpg" alt="Image">
								<h2>Spin</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="class.php" class="content-link">details</a>
								<br>
								<p id="redd"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/tone.jpg" alt="Image">
								<h2>Tone</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="class.php" class="content-link">details</a>
								<br>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/zumba.jpg" alt="Image">
								<h2>Zumba</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="class.php" class="content-link">details</a>
								<br>
								<p id="dets"></p>
							</div>
						</div>
						<!-- End Classes Area -->
					</div>
					<div id="section4">
						<div class="row">
							<!-- Start Testimornial Area-->
							<div class="col-lg-12">
								<div class="tm-box">
									<img src="img/testimony.jpg" alt="Image" class="img-responsive">
									<div class="tm-box-description">
										<h2>Testimornial</h2>
										<p class="feedback-content">" <?php echo $row['message']; ?> "</p>
										<p class="feedback-member">- <?php echo $row['name']; ?>  <span class="feedback-date"><?php echo $row['date']; ?></span></p>
										<a href="readmore.php" class="content-link">Read More</a>    
									</div>                        
								</div>                    
							</div>
							<!-- End Testimornial Area -->
						</div>
					</div>
				</div>
			</section>
		</div>
		<div id="section5">
			<!-- Start Feedback Area -->
			<section id="contact-area" class="contact-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center inner">
							<div class="contact-content">
								<h1>feedback form</h1>
								<div class="row">                            
									<div class="col-sm-12">
										<p>Nunc diam leo, fringilla vulputate elit lobortis, consectetur vestibulum quam. Sed id <br>
											felis ligula. In euismod libero at magna dapibus, in rutrum velit lacinia. <br>
											Etiam a mi quis arcu varius condimentum.</p>
									</div>                            
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<form action="feedback.php" method="post" class="contact-form">
								<div class="col-sm-6 contact-form-left">
									<div class="form-group">
										<input name="fn" type="text" class="form-control" id="name" maxlength="20" value="<?php if(isset($_POST['fn'])) echo $_POST['fn']; ?>" placeholder="Your first name" required />
										<input name="ln" type="text" class="form-control" id="name" maxlength="40" value="<?php if(isset($_POST['ln'])) echo $_POST['ln']; ?>" placeholder="Your last name" required />
										<input name="mobile" type="number" class="form-control" maxlength="20" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" placeholder="Your mobile no" requried />
										<input type="email" name="email" class="form-control" id="mail" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email" required />
									</div>
								</div>
								<div class="col-sm-6 contact-form-right">
									<div class="form-group">
										<textarea name="message" rows="6" class="form-control" id="comment" maxlength="500" placeholder="Your message here..." required ></textarea>
										<button type="submit" class="btn btn-default">Send</button>
									</div>
								</div>                        
							</form>    
						</div>                
					</div>
				</div>
			</section>
			<!-- End Feedback Area -->
		</div>
		
		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
		<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
		<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
		<script>
			// HTML document is loaded. DOM is ready.
			$(function() {

			// Parallax
				$('.intro-section').parallax({
					imageSrc: 'img/bg-1.1.jpg',
					speed: 0.2
				});
				$('.services-section').parallax({
					imageSrc: 'img/bg-2.1.jpg',
					speed: 0.2
				});
				$('.contact-section').parallax({
					imageSrc: 'img/bg-3.jpg',
					speed: 0.2
				});    

				// jQuery Scroll Up / Back To Top Image
				$.scrollUp({
					scrollName: 'scrollUp',      // Element ID
					scrollDistance: 300,         // Distance from top/bottom before showing element (px)
					scrollFrom: 'top',           // 'top' or 'bottom'
					scrollSpeed: 1000,            // Speed back to top (ms)
					easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
					animation: 'fade',           // Fade, slide, none
					animationSpeed: 300,         // Animation speed (ms)		        
					scrollText: '', // Text for element, can contain HTML		        
					scrollImg: true            // Set true to use image		        
				});

				// ScrollUp Placement
				$( window ).on( 'scroll', function() {
					// If the height of the document less the height of the document is the same as the
					// distance the window has scrolled from the top...
					if ( $( document ).height() - $( window ).height() === $( window ).scrollTop() ) {

						// Adjust the scrollUp image so that it's a few pixels above the footer
						$('#scrollUp').css( 'bottom', '80px' );

					} else {      
						// Otherwise, leave set it to its default value.
						$('#scrollUp').css( 'bottom', '30px' );        
					}
				});

				$('.single-page-nav').singlePageNav({
					offset: $('.single-page-nav').outerHeight(),
					speed: 1500,
					filter: ':not(.external)',
					updateHash: true
				});

				$('.navbar-toggle').click(function(){
					$('.single-page-nav').toggleClass('show');
				});

				$('.single-page-nav a').click(function(){
					$('.single-page-nav').removeClass('show');
				});
						
			});
		</script>
		
		<?php include("includes/footer.html"); ?>
		
	</body>
</html>