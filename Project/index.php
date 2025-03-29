<html>
<head>
	<title>Home</title>
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
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="about.php">About</a></li>
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
	
	<section id="hero">
		<h4>Only best for your pets</h4>
		<h2>Super value deals</h2>
		<h1>On all products</h1>
		<p>Save more with coupons & up to 30% off!</p>
		<button onclick="window.location.href='shop.php';">Shop Now</button>
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

	<section id="product" class="section-p1">
		<h2>Best Selling</h2>
		<p>Our products are tested by time and satisfied customers</p>
		<div class="pro-container">
			<div class="pro" >
				<img src="img/products/p1.jpg" alt="" onclick = move("img/products/p1.jpg","Type1","Name1",10)>
				<div class="des">
					<span>Type1</span>
					<h5>Name1</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$10</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p2.jpg" alt="" onclick = move("img/products/p2.jpg","Type2","Name2",20)>
				<div class="des">
					<span>Type2</span>
					<h5>Name2</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$20</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p3.jpg" alt="" onclick = move("img/products/p3.jpg","Type3","Name3",30)>
				<div class="des">
					<span>Type3</span>
					<h5>Name3</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$30</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p4.jpg" alt="" onclick = move("img/products/p4.jpg","Type4","Name4",40)>
				<div class="des">
					<span>Type4</span>
					<h5>Name4</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$40</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p5.jpg" alt="" onclick = move("img/products/p5.jpg","Type5","Name5",10)>
				<div class="des">
					<span>Type5</span>
					<h5>Name5</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$10</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p6.jpg" alt="" onclick = move("img/products/p6.jpg","Type6","Name6",20)>
				<div class="des">
					<span>Type6</span>
					<h5>Name6</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$20</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p7.jpg" alt="" onclick = move("img/products/p7.jpg","Type7","Name7",30)>
				<div class="des">
					<span>Type7</span>
					<h5>Name7</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$30</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p8.jpg" alt="" onclick = move("img/products/p8.jpg","Type8","Name8",40)>
				<div class="des">
					<span>Type8</span>
					<h5>Name8</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$40</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
		</div>
	</section>

	<section id="banner" class="section-m1">
		<h2>Why choose freeze-dried?</h2>
		<h4>Get started by saving <span>20%</span> on select freeze-dried food.</h4>
		<button class="normal">Explore More</button>
	</section>
	
	<section id="product" class="section-p1">
		<h2>New Products</h2>
		<p>Our products are tested by time and satisfied customers</p>
		<div class="pro-container">
			<div class="pro" >
				<img src="img/products/p1.jpg" alt="" onclick = move("img/products/p1.jpg","Type1","Name1",10)>
				<div class="des">
					<span>Type1</span>
					<h5>Name1</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$10</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p2.jpg" alt="" onclick = move("img/products/p2.jpg","Type2","Name2",20)>
				<div class="des">
					<span>Type2</span>
					<h5>Name2</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$20</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p3.jpg" alt="" onclick = move("img/products/p3.jpg","Type3","Name3",30)>
				<div class="des">
					<span>Type3</span>
					<h5>Name3</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$30</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p4.jpg" alt="" onclick = move("img/products/p4.jpg","Type4","Name4",40)>
				<div class="des">
					<span>Type4</span>
					<h5>Name4</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$40</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p5.jpg" alt="" onclick = move("img/products/p5.jpg","Type5","Name5",10)>
				<div class="des">
					<span>Type5</span>
					<h5>Name5</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$10</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p6.jpg" alt="" onclick = move("img/products/p6.jpg","Type6","Name6",20)>
				<div class="des">
					<span>Type6</span>
					<h5>Name6</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$20</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p7.jpg" alt="" onclick = move("img/products/p7.jpg","Type7","Name7",30)>
				<div class="des">
					<span>Type7</span>
					<h5>Name7</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$30</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
			<div class="pro" >
				<img src="img/products/p8.jpg" alt="" onclick = move("img/products/p8.jpg","Type8","Name8",40)>
				<div class="des">
					<span>Type8</span>
					<h5>Name8</h5>
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</div>
					<h4>$40</h4>
				</div>
				<a class="p-add"><i class="fas fa-cart-plus opp"></i></a>
			</div>
		</div>
	</section>
	
	<section id="sm-banner" class="section-p1">
		<div class="banner-box">
			<h4>Crazy Deals</h4>
			<h2>Buy 3 Get 1 Free</h2>
			<span>Save more with coupons & up to 30% off!</span>
			<button class="white">Learn more</button>
		</div>
		<div class="banner-box banner-box2">
			<h4>Crazy Deals</h4>
			<h2>Buy 3 Get 1 Free</h2>
			<span>Save more with coupons & up to 30% off!</span>
			<button class="white">Learn more</button>
		</div>
	</section>
	
	<section id="banner3">
		<div class="banner-box">
			<h2>Free 1 Hour Curbside Pickup</h2>
			<h3>Use code 89525</h3>
		</div>
		<div class="banner-box banner-box2">
			<h2>$10 off $60+ order</h2>
			<h3>plus Free Delivery</h3>
		</div>
		<div class="banner-box banner-box3">
			<h2>35% Off First Autoship</h2>
			<h3>Sale pricing + 5% off furute orders</h3>
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
			<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
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
			<a href="basket.php">View Basket</a>
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
	
	<script src="cart.js"></script>
	<script>
		function move(x,y,z,i){
			sessionStorage.setItem("img",x);
			sessionStorage.setItem("type",y);
			sessionStorage.setItem("name",z);
			sessionStorage.setItem("price",i);
			window.location.href='single_product.php';
		}
	</script>
</body>

</html>