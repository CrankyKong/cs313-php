<?php
session_start();

if(!isset($_SESSION['user_id'])) {
$_SESSION["user_id"] = 42;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPGTUBE HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body id="home">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">RPGTUBE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php#home">HOME</a></li>
		<li><a href="comingsoon.php">ABOUT RPGTUBE</a></li>
        <li><a href="comingsoon.php">VIDEOS</a></li>
        
		<?php
		//Profile for session
		if($_SESSION['user_id'] != 42){
		echo '<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Character</a></li>
            <li><a href="profile.php#inventory">Inventory</a></li>
			<li><a href="profile.php#friends">Friends</a></li>
            <li><a href="profile.php#accountInfo">Account Info</a></li> 
			<li><a href="signout.php">Sign out!</a></li> 
          </ul>
        </li>';
		}
		else
		{
		//Sing in or up
		echo '
		<li><a href="signup.php">Sign Up</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
				<form action="signin.php" method="post" accept-charset="UTF-8">
				<input id="user_username" style="margin-bottom: 15px;" type="text" name="user" size="30" />
				<input id="user_password" style="margin-bottom: 15px;" type="password" name="password" size="30" />
				<input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
				<label class="string optional" for="user_remember_me"> Remember me</label> 
				<input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
				<br />
				<br />
				</form>
            </div>
          </li>';
		}
		  ?>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<br />
<br />
<h1>Welcome to RPGtube!</h1>
<?php
echo "<p>Hi there! this site is under construction right now! Feel free to click around!</p>";

?>


</body>
</html>