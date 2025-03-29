<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "Walter1", "project_shop");

$newPassword = $_POST["new_password"];

$username = $_SESSION["username"];
$query = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password.";
}

mysqli_close($conn);
header("Location: user.php");
?>
