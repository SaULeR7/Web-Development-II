<html>
<head>
	<title>Basket</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link type="text/css" rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		#checkoutForm {
		  padding:40px 80px;
		  width: 100%;
		  max-width: 100%;
		  margin: 10px auto; 
		  justify-content: space-between;
		  display: flex;
		  flex-wrap: wrap;
		}

		#checkoutForm input {
		  width: 100%;
		  padding: 10px;
		  margin-bottom: 15px;
		  padding: 10px 20px;
		  padding: 10px 20px;
		  outline: none;
		  width: 60%;
		  margin-right: 10px;
		  border: 1px solid #e2e9e1;
		}

		#coupon,
		#subtotal {
		  padding: 10px 20px;
		  width: 50%;
		  margin-bottom:30px;
		}
	</style>
</head>

<body>
	<section id="header">
		<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
	
		<div>
			<ul id="navbar">
				<li><a href="index.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a class="active" href="basket.php"><i class="fas fa-shopping-cart"></i></a></li>
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
	
	<section id="page-header">
		<h2>#stayhome</h2>
		<p>Save more with coupons & up to 30% off!</p>
	</section>

	<section id="basket" class="section-p1">
		<table width="100%">
			<thead>
				<tr>
					<td>Remove</td>
					<td>Image</td>
					<td>Product</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Subtotal</td>
				</tr>
			</thead>
			<tbody id="tbody">
				
			</tbody>
		</table>
	</section>

	<section id="basket-add" class="section-p1">
	<form id="checkoutForm" method="post" action="checkout.php" >
		<input type="hidden" name="basketItems" id="basketItems" value="">
		<input type="hidden" name="totalCost" id="totalCost" value="">
		
		<div id="coupon">
			<h3>Apply Coupon</h3>
			<div>
				<input type="text" placeholder="Enter Your Coupon">
				<button class="normal">Apply</button>
			</div>
		</div>
		<div id="subtotal">
			<h3>Basket Total</h3>
			<table>
				<tr>
					<td>Basket Subtotal</td>
					<td id="sub">$0</td>
				</tr>
				<tr>
					<td>Shipping</td>
					<td>Free</td>
				</tr>
				<tr>
					<td><b>Total</b></td>
					<td id="tot"><b>$0</b></td>
				</tr>
			</table>
			<button class = "normal" onclick = "proceedToCheckout()">Proceed to checkout</button>
		</div>
	</form>
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
	
	<script src="cart.js"></script>

	</body>

</html>