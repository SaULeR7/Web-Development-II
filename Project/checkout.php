<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $userId = $_SESSION["id"];
    if (isset($_POST['basketItems']) && $_POST['basketItems'] !== null) {
    $basketItems = json_decode($_POST['basketItems'], true);
	}
    $totalCost = $_POST["totalCost"];


    $conn = new mysqli("localhost", "root", "Walter1", "project_shop");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	
	$query = "SELECT max(purchase_group_id) AS max_id FROM purchase;";
	$result = mysqli_query($conn, $query);
	if ($result) {
			$row = mysqli_fetch_assoc($result);
			if ($row) {
				$maxId = intval($row['max_id']);
				$nextId = $maxId + 1;
			} 
		}
	$sqlValues = [];
	$sql = "";
	
	if (is_array($basketItems)) {
    foreach ($basketItems as $itemName => $itemDetails) {
        $productType = $itemDetails["type"];
        preg_match_all('!\d+!', $productType, $matches);
        $productId = $matches[0][0];
        $productName = $itemDetails["name"];
        $quantity = $itemDetails["inBasket"];
        $totalPrice = $itemDetails["price"] * $quantity;

        $sqlValues[] = sprintf(
            "(%d, %d, %d, %.2f, %d)",
            $userId,
            $productId,
            $quantity,
            $totalPrice,
            $nextId
        );
    }

    $sql = "INSERT INTO purchase (id_user, id_product, amount, total_price, purchase_group_id) VALUES " . implode(',', $sqlValues);
    $conn->query($sql);
    $conn->close();

    unset($_SESSION["basketItems"]);
    unset($_SESSION["totalCost"]);

    header("Location: success.php");
    exit();
	}
	else {
		header("Location: basket.php");
	}
}
?>