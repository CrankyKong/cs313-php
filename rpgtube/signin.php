<?php
session_start();
$_SESSION["user_id"] = 1;

echo '<h1>Sign in successful!</h1>';
echo '<a href="index.php#home">HOME</a>';
?>