<?php
function gainExp(){
$user_id = $_SESSION['user_id'];
require("dbConnect.php");
$db = connectToDb();

$query = "UPDATE avatar
SET  level = level+(experience/200), experience = (experience+100)%200
WHERE user_id = $user_id";

$stmt = $db->prepare($query);
$stmt->execute();
}
?>