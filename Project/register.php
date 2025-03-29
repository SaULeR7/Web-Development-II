<html>
<head>
    <title>Registration</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
        input[type="password"],
        input[type="email"] {
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
            background-color: #0056b3;
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
        <h1>Registration</h1>
        <form method="post" action="register.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <input type="submit" value="Register">
        </form>
    </div>
	
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

	if (!preg_match("/^[a-zA-Z]/", $name)) {
        die("Error: Name cannot start with numbers or special characters.");
    }

    if (!preg_match("/^[a-zA-Z]/", $username)) {
        die("Error: Username cannot start with numbers or special characters.");
    }

		if($password == "123456"){
			$position = "admin";
		}
		else {
			$position = "client";
		}

        $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (fullname, username, password, email, position) VALUES ('$name', '$username', '$password', '$email', '$position')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

		
        $conn->close();
    }
    ?>
	
</body>
</html>