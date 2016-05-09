<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Survey Results</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="survey.css">
  </head>
<body>
<?php
$result = fopen("messages.txt", "r") or die("Cannont open the file!");

  $panda = 0;
  $lion = 0;
  $ele = 0;
  $gator = 0;

  $toy1 = 0;
  $toy2 = 0;
  $toy3 = 0;

  $red = 0;
  $blue = 0;
  $yellow = 0;

  $one = 0;
  $two = 0;
  $three = 0;
  $four = 0;
  $five = 0;

  while(!feof($result)) {

	$line = fgets($result);

  $string = explode(' ', "$line   ");


    if($string[0] == "elephant")   {
      $ele++;
    }
    if($string[0] == "lion"){
      $lion++;
    }
    if($string[0] == "panda"){
      $panda++;
    }
    if($string[0] == "gator") {
      $gator++;
    }
    if($string[1] == "ToyStory") {
      $toy1++;
    }
    if($string[1] == "ToyStory2") {
      $toy2++;
    }
    if($string[1] == "ToyStory3") {
      $toy3++;
    }
    
    if($string[2] == "Red") {
      $red++;
    }
    if($string[2] == "Yellow") {
      $yellow++;
    }
    if($string[2] == "Blue") {
      $blue++;
    }
	
    if($string[3] == '1') {
      $one++;
    }
    if($string[3] == '2' ) {
      $two++;
  }
  if($string[3] == '3' ) {
      $three++;
  }
  if($string[3] == '4' ) {
      $four++;
  }
  if($string[3] == '5' ) {
      $five++;
  }
  }
?>
<div class="container">
<h1>Results: </h1>

<div class="container" style="background-color: #ff6600;">
  
    
<?php 
echo "<div class='row'>";
echo "<div class='col-lg-3'>";
echo "<h3>Cute Animal Picture</h3>";
echo "<p> $ele Elephant</p>";
echo "<p> $lion Lion</p>";
echo "<p> $panda Panda</p>";
echo "<p> $gator Alligator</p>";
echo "</div><div class='col-lg-3'>";
echo "<h3>Best Toy Story</h3>";
echo "<p> $toy1 Toy Story</p>";
echo "<p> $toy2 Toy Story 2</p>";
echo "<p> $toy3 Toy Story 3</p>";
echo "</div><div class='col-lg-3'>";
echo "<h3>Favorite Primary Colors</h3>";
echo "<p> $red Red</p>";
echo "<p> $blue Blue</p>";
echo "<p> $yellow Yellow</p>";
echo "</div><div class='col-lg-3'>";
echo "<h3>Ratings of this survey</h3>";
echo "<p> $one One Amazing</p>";
echo "<p> $two Two</p>";
echo "<p> $three Three Really Amazing</p>";
echo "<p> $four Four</p>";
echo "<p> $five Five Amazingly Amazing</p>";
echo "</div></div>";
 fclose($result);
 ?>
</div>
</body>
</html>