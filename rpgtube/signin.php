<?php
require("dbConnect.php");
$db = connectToDb();
$user = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);

session_start();

$stmt = $db->query("SELECT u.id, u.password, a.character_id, i.inv_id from user u
join avatar a ON a.user_id = u.id
join inventory i ON i.avatar_id = a.character_id WHERE username = '$user'");

$row = $stmt->fetch(PDO::FETCH_ASSOC);


if(password_verify($password, $row['password'])){
$checkpass = $row['password'];
$user_id = $row['id'];
$avatar_id = $row['character_id'];
$inv_id = $row['inv_id'];
$_SESSION["user_id"] = $user_id;
$_SESSION["avatar_id"] = $avatar_id;
$_SESSION["inv_id"] = $inv_id;

echo '<h1>Sign in successful!</h1>';
}
else{
	echo '<h1>Sign in NOT successful!</h1>';
	
}
echo '<a href="index.php#home">HOME</a>';
?>