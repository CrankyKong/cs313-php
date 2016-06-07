<?php
require("password.php");
require("dbConnect.php");
$db = connectToDb();


$user = htmlspecialchars($_POST['user']);
$userN = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$avatar = htmlspecialchars($_POST['avatar']);
		
$query = 'INSERT INTO user(username, password) VALUES (:user, :password)';
$stmt = $db->prepare($query);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':password', $passwordHash, PDO::PARAM_STR);
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

$stmt = $db->query("SELECT character_id from avatar where user_id = $user_id");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$avatar_id = $row['character_id'];
$_SESSION["avatar_id"] = $avatar_id;

$stmt = $db->prepare("INSERT INTO inventory(gold, avatar_id) VALUES (500, $avatar_id)");
$stmt->execute();

$stmt = $db->query("SELECT inv_id from inventory where avatar_id = $avatar_id");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$inv_id = $row['inv_id'];
$_SESSION["inv_id"] = $inv_id;

$stmt = $db->prepare("INSERT INTO items_in_inventory(item_id, inv_id) VALUES (1, $inv_id)");
$stmt->execute();

header("Location: index.php");
die("Page should have been redirected");	
?>