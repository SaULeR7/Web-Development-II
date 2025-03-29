<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit();
    }

$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Newsletters (email) VALUES ('$email')";

    if ($conn->query($sql)) {
        echo '<script>';
        echo 'alert("Email added to newsletters successfully!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
