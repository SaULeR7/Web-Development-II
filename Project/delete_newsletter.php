<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_newsletter"])) {
    $newsletterId = $_POST["newsletter_id"];

    $newsletterId = filter_var($newsletterId, FILTER_SANITIZE_NUMBER_INT);

    $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $deleteNewsletterSql = "DELETE FROM newsletters WHERE id = $newsletterId";
	$conn->query($deleteNewsletterSql); 
    $conn->close();
	
	header("Location: user.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
