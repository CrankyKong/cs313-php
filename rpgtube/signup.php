
	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
	require("navbar.php");
	display();
?>
<br />
<br />
<br />
<br />
<form action="addUser.php" method="POST">
			<input type="text" name="user" placeholder="User"></input>
			<input id="user_password" type="text" type="password" name="password" placeholder="Password"></input>
			<input type="text" name="avatar" placeholder="Avatar Name"></input>
			<input type="submit" value="Sign Up"></input>
		
		</form>
		
		
		







</body>
</html>