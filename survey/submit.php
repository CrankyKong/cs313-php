<?php

if (session_status() != PHP_SESSION_NONE) {
    header("Location: messages.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Survey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="survey.css">
</head>
<body>
<div class="container">
<h3>PHP Survey</h3>
</div>
<div class="container" style="background-color:lightgrey;">
	<form method="POST" action="handleSubmit.php">
	<table class="table">
		<thead>
		<tr>
		<b>1. Which animal is the cutest?</b>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>
			<div class="button">
				<input type="radio" name="animal" value="elephant" id="elephant" />
				<label for="elephant"><img src="ele.jpg" class="img-thumbnail" alt="elephant" width="150" height="150"></label>
			</div>
			</td>
			<td>
			<div class="button">
				<input type="radio" name="animal" value="lion" id="lion" />
				<label for="lion"><img src="lion.jpg" class="img-thumbnail" alt="lion" width="150" height="150"></label>
			</div>
			</td>
			<td>
			<div class="button">
				<input type="radio" name="animal" value="panda" id="panda" />
				<label for="panda"><img src="panda.jpg" class="img-thumbnail" alt="panda" width="150" height="150"></label>
			</div></td>
			<td>
			<div class="button">
				<input type="radio" name="animal" value="gator" id="gator" />
				<label for="gator"><img src="gator.jpg" class="img-thumbnail" alt="gator" width="150" height="150"></label>
			</div></td>
		</tr>
		<tr>
			<td><b>2. Which Toy Story is the best?</b></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td><input type="radio" name="movie" value="ToyStory" id="Toy Story">
			<label for="Toy Story">Toy Story</label></td>
			<td><input type="radio" name="movie" value="ToyStory2" id="Toy Story 2">
			<label for="Toy Story 2">Toy Story 2</label></td>
			<td><input type="radio" name="movie" value="ToyStory3" id="Toy Story 3">
			<label for="Toy Story 3">Toy Story 3</label></td><td></td>
		</tr>	
		<tr>
			<td><b>3. What is your favorite primary color?</b></td>
		</tr>
		<tr>
			<td><input type="radio" name="color" value="Red" id="Red">
			<label for="Red"><font color="Red">Red</font></label></td>
			<td><input type="radio" name="color" value="Yellow" id="Yellow">
			<label for="Yellow"><font color="Yellow">Yellow </font></label></td>
			<td><input type="radio" name="color" value="Blue" id="Blue">
			<label for="Blue"><font color="blue">Blue</font></label></td><td></td>
		</tr>
		<tr>
			<td><b>4. How great is this survey?</b></td><td></td><td></td><td></td>
		</tr>
		<tr><td>
		<select name="rating">
			<option value="1">1 Amazing</option>
			<option value="2">2</option>
			<option value="3">3 Really Amazing</option>
			<option value="4">4</option>
			<option value="5">5 Amazingly Amazing</option>
		</select></td>
		</tr>
		</tbody>
		
		
		
	</table>
	<input type="submit" class="btn btn-success" value="Submit Answers"></input>
	<a href="messages.php" class="btn btn-success" role="button">Results</a>
	</form>
	</div>
</body>
</html>