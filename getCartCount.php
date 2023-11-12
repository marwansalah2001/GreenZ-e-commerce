<?php
require_once "connection.php";
session_start();

if (isset($_SESSION['userID'])) {
    $user_id = $_SESSION['userID'];

    $sql = "SELECT COUNT(*) AS cartCount FROM cart WHERE userID = '$user_id'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    echo $row['cartCount'];
} else {
    echo 0;
}
?>
