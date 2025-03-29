<?php
session_start();
$_SESSION['userLoggedIn'] = false;
session_destroy();
header("Location: index.php");
exit();
?>
