<?php

session_start();
$user_id = $_SESSION['user_id'];
$inv_id = $_SESSION['inv_id'];
require("dbConnect.php");
$db = connectToDb();


$query = "SELECT item_id FROM item WHERE name = 'Yoshi Egg'";
$stmt = $db->query($query);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$item_id = $row['item_id'];


$query = "INSERT INTO items_in_inventory(item_id, inv_id) VALUES ($item_id, $inv_id)";
$stmt = $db->prepare($query);
$stmt->execute();


header("Location: videos.php");
die("Page should have been redirected");

?>