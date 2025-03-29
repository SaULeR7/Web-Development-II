<html>
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link type="text/css" rel="stylesheet" href="style.css">
	<style>
        body {
            font-family: 'Macondo', sans-serif;
            background-color: #4b2929;
            color: #e6d3d3;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #088177;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #088177;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            color: #465b52;
            display: inline-block;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #088177;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 0;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #fff;
            color: #088177;
        }
        .signup-link {
            text-align: center;
            margin-top: 15px;
            color: #088177;
        }
        .signup-link a {
            color: #0056b3;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
	
		<div>
			<ul id="navbar">
				<li><a href="index.php">Home</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="basket.php"><i class="fas fa-shopping-cart"></i></a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	
    </div>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
        <div class="signup-link">
            Don't have an account? <a href="register.php">Sign up for free!</a>
        </div>
    </div>
	
    <?php
	session_start();
	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username = '$enteredUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row["password"] == $enteredPassword) {
				$_SESSION['userLoggedIn'] = true;
				$_SESSION["id"] = $row["id"]; 
				$_SESSION["username"] = $row["username"]; 
				$_SESSION["fullname"] = $row["fullname"];
				$_SESSION["role"] = $row["position"]; 				
				$conn->close();
				header("Location: index.php"); 
				exit();
            } else {
                echo "Incorrect password. Please try again.";
            }
        } else {
            echo "User not found. Please register or check your username.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
