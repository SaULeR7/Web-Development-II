<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_client"])) {
    $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $clientId = $_POST["client_id"];

    $deletePurchasesSql = "DELETE FROM purchase WHERE id_user = $clientId";
    $conn->query($deletePurchasesSql);

    $deleteClientSql = "DELETE FROM users WHERE id = $clientId";
    $conn->query($deleteClientSql);

    $conn->close();

    header("Location: user.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
