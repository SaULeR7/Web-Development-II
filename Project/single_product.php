<html>
<head>
	<title>Shop</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link type="text/css" rel="stylesheet" href="style.css">
	<script src="cart.js"></script>
</head>

<body>
	<section id="header">
		<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
	
		<div>
			<ul id="navbar">
				<li><a href="index.php">Home</a></li>
				<li><a class="active" href="shop.php">Shop</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="basket.php"><i class="fas fa-shopping-cart"></i></a></li>
				<?php
				if (isset($_SESSION["username"])) {
					echo '<li><a Welcome, ' . $_SESSION["name"] . '!</a></li>';
				} else {
					echo '<li><a href="login.php">Login</a></li>';
				}
				?>
			</ul>
		</div>
	
	</section>
	
	<section id="prodetail" class="section-p1">
		<div class="single-pro-image">
			<img src="img1/p1.jpg" width="100%" id="MainImg" alt="">
			
			<div  class="small-img-group">
				<div class="small-img-col">
					<img src="img/products/p1.jpg" width="100%" class="small-img" alt="">
				</div>
				<div class="small-img-col">
					<img src="img/products/p2.jpg" width="100%" class="small-img" alt="">
				</div>
				<div class="small-img-col">
					<img src="img/products/p3.jpg" width="100%" class="small-img" alt="">
				</div>
				<div class="small-img-col">
					<img src="img/products/p4.jpg" width="100%" class="small-img" alt="">
				</div>
			</div>
		</div>
		<div class="single-pro-details">
			<h6 id="type"></h6>
			<h4 id="name"></h4>
			<h2 id="price">$</h2>
			<select>
				<option>Chose Color</option>
				<option>Red</option>
				<option>Blue</option>
				<option>Black</option>
				<option>White</option>
			</select>
			<input id="numberOf" type="number" min="1" value="1">
			<button class="normal" onclick=add_item()>Add To Basket</button>
			<h4>Product Details</h4>
			<p>Do you have a frisky pup who loves to play tug? A Boss Pet Chomper Interactive Tug Ball Dog Toy may be the best new toy. This engaging toy is constructed from durable braided nylon with a looped handle for easy tossing or gripping. The high-quality ballistic nylon is great for pups that love to chew!</p>
		</div>
	</section>
	
	<section id="product" class="section-p1">
		<h2>You May Also Like</h2>
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
	
	<script>
		document.getElementById("type").innerHTML = sessionStorage.getItem("type");
		document.getElementById("name").innerHTML = sessionStorage.getItem("name");
		document.getElementById("price").innerHTML += sessionStorage.getItem("price");

		var main = document.getElementById("MainImg");
		var newImg = new Image;
		newImg.onload = function() {
			main.src = this.src;
		}
		newImg.src = sessionStorage.getItem("img");
	
		var small = document.getElementsByClassName("small-img");
		
		small[0].onclick = function(){
			main.src = small[0].src;
		}
		small[1].onclick = function(){
			main.src = small[1].src;
		}
		small[2].onclick = function(){
			main.src = small[2].src;
		}
		small[3].onclick = function(){
			main.src = small[3].src;
		}
	</script>
	
</body>

</html>