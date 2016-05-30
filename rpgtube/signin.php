<?php
require("dbConnect.php");
$db = connectToDb();
$user = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);

session_start();

$stmt = $db->query("SELECT id,password from user WHERE username = '$user'");

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$checkpass = $row['password'];
$user_id = $row['id'];
$_SESSION["user_id"] = $user_id;


echo "<p>$user and $password and $checkpass</p>";
echo "<p>$user_id</p>";
echo '<h1>Sign in successful!</h1>';
echo '<a href="index.php#home">HOME</a>';
?>