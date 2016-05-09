<?php
session_start();
?>

<?php
$animal = htmlspecialchars($_POST["animal"]);
$movie = $_POST["movie"];
$color = $_POST["color"];
$rate  = $_POST["rating"];
//$comment = htmlspecialchars($_POST["comment"]);
$line = "$animal $movie $color $rate \n";
// append this line to the file
file_put_contents("messages.txt", $line, FILE_APPEND);
// redirect to the messages page
header('Location: messages.php');
?>