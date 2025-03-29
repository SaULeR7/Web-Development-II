<?php
session_start();

$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$userRole = $_SESSION["role"];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);


$user = [];

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Error fetching user data.";
    exit(); 
}
?>

<html>
<head>
	<title><?php echo ($userRole === "admin") ? "Admin Dashboard" : "User Dashboard"; ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link type="text/css" rel="stylesheet" href="style.css">
	<style>
       body {
		font-family: 'Arial', sans-serif;
		background-color: #f4f4f4;
		margin: 0;
		padding: 0;

		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 100vh;
		}

		h1, h3 {
			color: #088177;
		}

		.dashboard-container {
			max-width: 100%;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-top: 20px;
			
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
			font-size: 20px;
		}

		.change-password-form, .logout-form, .delete-client-form {
			margin-top: 20px;
			width: 100%;
		}

		label, input, button {
			width: 200px;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		button {
			background-color: #088177;
			color: #fff;
			cursor: pointer;
			padding: 10px;
			border: none;
			border-radius: 5px;
		}

		.client-purchases {
			border: 1px solid #ddd;
			margin-top: 20px;
			padding: 15px;
			border-radius: 8px;
		}

		.client-purchases h4 {
			margin-bottom: 10px;
			color: #333;
		}

		.client-total {
			margin-top: 10px;
			font-weight: bold;
			color: #333;
		}

		.delete-client-btn {
			background-color: #dc3545;
			color: #fff;
			border: none;
			padding: 8px 15px;
			border-radius: 4px;
			cursor: pointer;
		}
		 .logout-form {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}
		.change-password-form {
			max-width: 400px;
			margin: 0;
			padding: 20px;
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.change-password-form label {
			display: block;
			margin-bottom: 8px;
			color: #333;
			font-weight: bold;
		}

		.change-password-form input {
			width: 100%;
			padding: 10px;
			margin-bottom: 16px;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
		}

		.change-password-form button {
			background-color: #088177;
			color: #fff;
			border: none;
			padding: 12px;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		.change-password-form button:hover {
			background-color: #065a4f;
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
				<li><a href="basket.php"><i class="fas fa-shopping-cart"></i></a></li>
				<li>
					<?php
					
					if (isset($_SESSION["username"])) {
						echo '<a class="active" href="user.php">Welcome, ' . $_SESSION["fullname"] . '!</a>';
					} else {
						echo '<a href="login.php">Login</a>';
					}
					?>
				</li>
			</ul>
		</div>
	</section>
	
	<div class="dashboard-container">
        <h1>Welcome, <?php echo $user["fullname"]; ?>!</h1>

        <?php if ($userRole === "client"): ?>
        <h3>Purchase History</h3>
        <div class="purchase-history">
            <?php
            $conn = new mysqli("localhost", "root", "Walter1", "project_shop");
            $userId = $user["id"];

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT GROUP_CONCAT(product.name ORDER BY product.name ASC) AS product_names,
						   SUM(purchase.amount) AS total_amount,
						   SUM(purchase.total_price) AS total_price
					FROM purchase
					JOIN product ON purchase.id_product = product.id
					WHERE purchase.id_user = $userId
					GROUP BY purchase.purchase_group_id";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo '<table border="1">
						<tr>
							<th>Product Names</th>
							<th>Total Amount</th>
							<th>Total Price</th>
						</tr>';

				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["product_names"] . "</td>";
					echo "<td>" . $row["total_amount"] . "</td>";
					echo "<td>$" . $row["total_price"] . "</td>";
					echo "</tr>";
				}

				echo '</table>';
			} else {
				echo "No purchase history found.";
			}

			$conn->close();
			?>
		<?php elseif ($userRole === "admin"): ?>
			<h3>Admin Dashboard</h3>

			<?php
			$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$overallTotal = 0;

			$sql = "SELECT users.id AS client_id, users.fullname AS client_name
					FROM users
					WHERE users.position = 'client'";

			$clientsResult = $conn->query($sql);

			if ($clientsResult->num_rows > 0) {
				while ($clientRow = $clientsResult->fetch_assoc()) {
					$clientId = $clientRow["client_id"];
					$clientName = $clientRow["client_name"];

					echo '<div class="client-purchases">';
					echo "<h4>Purchases for Client: $clientName (ID: $clientId)</h4>";

					$clientTotal = 0;


					$purchasesSql = "SELECT purchase.purchase_group_id, 
										   GROUP_CONCAT(CONCAT(product.name, '(', purchase.amount, ')') ORDER BY product.name ASC) AS product_details,
										   SUM(purchase.amount) AS total_amount,
										   SUM(purchase.total_price) AS total_price
									FROM purchase
									JOIN product ON purchase.id_product = product.id
									WHERE purchase.id_user = $clientId
									GROUP BY purchase.purchase_group_id";

					$purchasesResult = $conn->query($purchasesSql);

					if ($purchasesResult->num_rows > 0) {
						echo '<table border="1">
								<tr>
									<th>Purchase ID</th>
									<th>Product Details</th>
									<th>Total Amount</th>
									<th>Total Price</th>
								</tr>';

						while ($row = $purchasesResult->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["purchase_group_id"] . "</td>";
							echo "<td>" . $row["product_details"] . "</td>";
							echo "<td>" . $row["total_amount"] . "</td>";
							echo "<td>$" . $row["total_price"] . "</td>";
							echo "</tr>";

							$clientTotal += $row["total_price"];
						}

						echo '</table>';
					} else {
						echo "No purchase history found for this client.";
					}

					echo "<p>Total Purchase Amount for $clientName: $$clientTotal</p>";
					
					echo '<form method="post" action="delete_client.php">';
					echo '<input type="hidden" name="client_id" value="' . $clientId . '">';
					echo '<button type="submit" name="delete_client">Delete Client</button>';
					echo '</form>';
					echo '<br>';
					echo '</div>';

					$overallTotal += $clientTotal;
				}
			} else {
				echo "No clients found.";
			}

			echo "<h4>Overall Total Purchase Amount: $$overallTotal</h4>";

			$conn->close();
			
			
			?>
			<br><br>
			<h3>Feedback</h3>
			<div class="feedback-section">
				<?php
				$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$feedbackSql = "SELECT * FROM feedback";
				$feedbackResult = $conn->query($feedbackSql);

				if ($feedbackResult->num_rows > 0) {
					echo '<table border="1">
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Subject</th>
								<th>Feedback</th>
								<th>Action</th>
							</tr>';

					while ($feedbackRow = $feedbackResult->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $feedbackRow["name"] . "</td>";
						echo "<td>" . $feedbackRow["email"] . "</td>";
						echo "<td>" . $feedbackRow["subject"] . "</td>";
						echo "<td>" . $feedbackRow["message"] . "</td>";
						echo "<td><form method='post' action='delete_feedback.php'>
									<input type='hidden' name='feedback_id' value='" . $feedbackRow["id"] . "'>
									<button type='submit' name='delete_feedback'>Delete</button>
								</form></td>";
						echo "</tr>";
					}

					echo '</table>';
				} else {
					echo "No feedback found.";
				}
				
				$conn->close();
				?>
			</div>
			<br><br>
			<h3>Newsletters</h3>
			<div class="newsletters-section">
				<?php
				$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$newsletterSql = "SELECT * FROM newsletters";
				$newsletterResult = $conn->query($newsletterSql);

				if ($newsletterResult->num_rows > 0) {
					echo '<table border="1">
							<tr>
								<th>ID</th>
								<th>Email</th>
								<th>Action</th>
							</tr>';

					while ($newsletterRow = $newsletterResult->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $newsletterRow["id"] . "</td>";
						echo "<td>" . $newsletterRow["email"] . "</td>";
						echo "<td><form method='post' action='delete_newsletter.php'>
                        <input type='hidden' name='newsletter_id' value='" . $newsletterRow["id"] . "'>
                        <button type='submit' name='delete_newsletter'>Delete</button>
                    </form></td>";
						echo "</tr>";
					}

					echo '</table>';
					echo "<button type='submit' name='group_message'>Send a group message</button>";
				} else {
					echo "No newsletters found.";
				}
				$conn->close();
				?>
			</div>
    </div>
		<?php else: ?>
			<p>Invalid user role. Please contact support.</p>
		<?php endif; ?>
	</div>
        <form class="change-password-form" method="post" action="change_password.php">
			<label for="new_password">New Password:</label>
			<input type="password" name="new_password" required>
			<button type="submit">Change Password</button>
		</form>
    
        <form class="logout-form" method="post" action="logout.php">
            <button type="submit">Logout</button>
        </form>
    </div>
	
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