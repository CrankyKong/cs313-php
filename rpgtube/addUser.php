<?php
require("dbConnect.php");
$db = connectToDb();


$user = htmlspecialchars($_POST['user']);
$userN = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);
$avatar = htmlspecialchars($_POST['avatar']);
		
$query = 'INSERT INTO user(username, password) VALUES (:user, :password)';
$stmt = $db->prepare($query);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->execute();
//fetch for one row
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user = $row['user'];
$password = $row['password'];


$query = "SELECT id from user where username = '$userN'";
$stmt = $db->query($query);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userid = $row['id'];
echo "<p>userid = $userid</p>";


$query = 'INSERT INTO avatar(name, level, experience, user_id) VALUES (:avatar, 0, 0, :userid)';
$stmt = $db->prepare($query);
$stmt->bindValue(':avatar', $avatar, PDO::PARAM_STR);
$stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$avatar = $row['name'];

session_start();
$stmt = $db->query("SELECT id from user WHERE username = '$userN'");

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['id'];
$_SESSION["user_id"] = $user_id;


header("Location: index.php");
die("Page should have been redirected");	
?>