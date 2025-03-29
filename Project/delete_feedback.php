<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_feedback"])) {
    $feedbackId = $_POST["feedback_id"];

    $feedbackId = filter_var($feedbackId, FILTER_SANITIZE_NUMBER_INT);

    $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $deleteFeedbackSql = "DELETE FROM feedback WHERE id = $feedbackId";
	$conn->query($deleteFeedbackSql); 

    $conn->close();
	header("Location: user.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
