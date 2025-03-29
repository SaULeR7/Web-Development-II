<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
		echo '<script>alert("Feedback submitted successfully!")</script>'; 
    } else {
		echo '<script>alert("Error")</script>'; 
    }

    $conn->close();
}
?>

<html>
<head>
	<title>Contact</title>
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
				<li><a href="about.php">About</a></li>
				<li><a class="active" href="contact.php">Contact</a></li>
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
	
	<section id="page-header">
		<h2>#let's_talk</h2>
		<p>Leave a Message. We'd love to hear from you!</p>
	</section>

	<section id="contact-details" class="section-p1">
		<div class="details">
			<span>GET IN TOUCH</span>
			<h2>Visit one of our agency locations or contact us today</h2>
			<h3>Head Office</h3>
			<div>
				<li>
					<i class="fas fa-map"></i>
					<p>31-10 Thomson Ave, Queens, NY 11101</p>
				</li>
				<li>
					<i class="fas fa-envelope"></i>
					<p>example@example.com</p>
				</li>
				<li>
					<i class="fas fa-phone-alt"></i>
					<p>example@example.com</p>
				</li>
				<li>
					<i class="fas fa-clock"></i>
					<p>Monday to Friday 09:00AM - 05:00PM</p>
				</li>
			</div>
		</div>
		
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.82825014506!2d-73.93725228465756!3d40.74380457932851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25ed4bb39e7d9%3A0x5c0884acbe9b2064!2sLaGuardia%20Community%20College!5e0!3m2!1sen!2sus!4v1652851377023!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
	</section>

	<section id="form-details">
		<form method="post" action="">
			<span>LEAVE A MESSAGE</span>
			<h2>We'd love to hear from you</h2>
			<input name="name" type="text" placeholder="Your Name" required>
			<input name="email" type="email" placeholder="E-mail" required>
			<input name="subject" type="text" placeholder="Subject" required>
			<textarea name="message" id="" cols="30" rows="10" placeholder="Yor Message" required></textarea>
			<button class="normal">Submit</button>
		</form>
		<div class="people">
			<div>
				<img src="img/people/1.png">
				<p><span>John Smith </span> Senior Marketing Manager <br> Phone:+1 (347) 531 - 3036 <br> Email: Example@example.com</p>
			</div>
			<div>
				<img src="img/people/2.png">
				<p><span>William Brown </span> Senior Marketing Manager <br> Phone:+1 (347) 531 - 3036 <br> Email: Example@example.com</p>
			</div>
			<div>
				<img src="img/people/3.png">
				<p><span>Karen Stone </span> Senior Marketing Manager <br> Phone:+1 (347) 531 - 3036 <br> Email: Example@example.com</p>
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

</body>

</html>


