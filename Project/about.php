<html>
<head>
	<title>About</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
	<section id="header">
		<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
	
		<div>
			<ul id="navbar">
				<li><a href="index.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a class="active" href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="basket.php"><i class="fas fa-shopping-cart"></i></a></li>
				<li>
					<?php
					session_start();
					if (isset($_SESSION["username"])) {
						echo '<a href="user.php">Welcome, ' . $_SESSION["fullname"] . '!</a>';
					} else {
						echo '<a href="login.php">Login</a>';
					}
					?>
				</li>
			</ul>
		</div>
	
	</section>
	
	<section id="page-header" class="about-header">
		<h2>#KnowUs</h2>
		<p>Save more with coupons & up to 30% off!</p>
	</section>

	<section id="about-head" class="section-p1">
		<img src="img/about/a1.jpg" alt="">
		<div>
			<h2>Who Are We?</h2>
			<p>At Pet's life, our mission is to offer you and your business superior products, at the lowest prices possible. Our range of quality pet supplies include dog beds, plush toys, sanitary products, pet stairs, and anything else the discerning pet owner could need.</p>
			<p>But what sets us apart from other pet suppliers, is that our stringent quality controls are applied at every stage of the manufacturing process, so we can guarantee the quality and safety of every product we sell. Thanks to our dedicated international team, we are also able to provide products under OEM arrangements, as well as becoming your company’s wholesaler.</p>
			<p>So, whether you’re a distributor looking for safety and quality guaranteed, or a national retail chain hoping to bring the most innovative and sought-after pet products to your shelves, our staff in New York will work tirelessly to bring you the best products, ideally suited to your needs and budget.</p>
			<abbr title="">DOWNLOAD CATALOG</abbr>
			
			<br><br>
			
			<marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Save more with coupons & up to 30% off!</marquee>
		</div>
	</section>
	
	<section id="about-app" class="section-p1">
		<h1>Download Our <a href="#">App</a></h1>
		<div class="video">
			<video autoplay muted loop src="img/about/video.mp4"></video>
		</div>
	</section>
	
	<section id="feature" class="section-p1">
		<div class="fe-box">
			<img src="img/features/f1.png" alt="">
			<h6>Free Shipping</h6>
		</div>
		<div class="fe-box">
			<img src="img/features/f2.png" alt="">
			<h6>Online Order</h6>
		</div>
		<div class="fe-box">
			<img src="img/features/f3.png" alt="">
			<h6>Save Money</h6>
		</div>
		<div class="fe-box">
			<img src="img/features/f4.png" alt="">
			<h6>Promotions</h6>
		</div>
		<div class="fe-box">
			<img src="img/features/f5.png" alt="">
			<h6>Happy Sell</h6>
		</div>
		<div class="fe-box">
			<img src="img/features/f6.png" alt="">
			<h6>24/7 Support</h6>
		</div>
	</section>

	<section id="newsletter" class="section-p1">
		<div class="newstext">
			<h4>Sign Up For Newsletters</h4>
			<p><span>Save $5 off $30</span> when you sign up for emails.</p>
		</div>
		<form method="post" action="process_newsletter_signup.php" class="newsletter-form">
		<div class="form">
			<input name="email" type="text" placeholder="Your email address">
			<button class="normal">Sign Up</button>
		</div>
		</form>
	</section>
	
	<footer class="section-p1">
		<div class="col">
			<img class="logo" src="img/logo.png" alt="">
			<h4>Contact</h4>
			<p><strong>Address: </strong> 345 Welfdls st, New York</p>
			<p><strong>Phone: </strong> +1 (347) 531 - 3036</p>
			<p><strong>Hours: </strong> 09:00AM - 05:00PM, Mon - Fri</p>
			<div class="follow">
				<h4>Follow us</h4>
				<div class="icon">
				<a href="http:\\www.facebook.com"><i class="fab fa-facebook-f"></i></a>
				<a href="http:\\www.tweeter.com"><i class="fab fa-tweeter"></i></a>
				<a href="http:\\www.instagram.com"><i class="fab fa-instagram"></i></a>
				<a href="http:\\www.pinterest.com"><i class="fab fa-pinterest-p"></i></a>
				<a href="http:\\www.youtube.com"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col">
			<h4>About</h4>
			<a href="about.php">About us</a>
			<a href="#">Delivery Information</a>
			<a href="#">Privacy Policy</a>
			<a href="#">Terms & Conditions</a>
			<a href="contact.php">Contact us</a>
		</div>
		
		<div class="col">
			<h4>My Account</h4>
			<a href="#">Sign In</a>
			<a href="basket.php">View Cart</a>
			<a href="#">My Wishlist</a>
			<a href="#">Track My Order</a>
			<a href="#">Help</a>
		</div>
		
		<div class="col install">
			<h4>Install App</h4>
			<p>From App Store or Google Play</p>
			<div class="row">
				<img src="img/pay/app.jpg" alt="">
				<img src="img/pay/play.jpg" alt="">
			</div>
			<p>Secured Payment Gateaways </p>
			<img src="img/pay/pay.png">
		</div>
		
		<div class="copyright">
			<p>Copyright © 2022</p>
		</div>
		
	</footer>
	
</body>

</html>