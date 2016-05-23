<?php
	/*Don't forget to create a user for your database
	CREATE USER 'steve'@'localhost' IDENTIFIED BY 'nerdface'; 
	GRANT INSERT, SELECT, UPDATE, DELETE ON movies.* TO 'steve'@'localhost'; 
	flush privileges
	*/
	$dbHost = "";
	$dbPort = "";
	$dbUser = "";
	$dbPassword = "";

    $dbName = 'rpgtube';

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
	if ($openShiftVar === null || $openShiftVar == "")
	{
     // Not in the openshift environment
	$dbHost = 'localhost';
	$dbUser = 'logan';
	$dbPassword = 'pass';
	}
	else 
	{
    // In the openshift environment 
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	}
	
	try {
		$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
	} catch (Exception $e) {
		echo $e;
		die();
	}
	/*************************
	Sessions!
	************************/
	session_start();
	$user_id = $_SESSION['user_id'];
	//$user_id = 1;
	?>





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
		<li><a href="comingsoon.html">ABOUT RPGTUBE</a></li>
        <li><a href="comingsoon.html">VIDEOS</a></li>
        
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
		<li><a href="comingsoon.html">Sign Up</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
				<form action="signin.php" method="post" accept-charset="UTF-8">
				<input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" />
				<input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" />
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
<br />
<br />
<div class="container">
  <h2>Character's Name HERE</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#character">Character</a></li>
    <li><a data-toggle="tab" href="#inventory">Inventory</a></li>
    <li><a data-toggle="tab" href="#friends">Friends</a></li>
    <li><a data-toggle="tab" href="#accountInfo">Account Info</a></li>
  </ul>

  <div class="tab-content">
    <div id="character" class="tab-pane fade in active">
      <h3>Character</h3>
      <?php
		foreach ($db->query("SELECT name, level, experience FROM avatar where user_id = $user_id") as $row)
		{
		echo '<li>' . $row['name'] . "</li><br />";
		echo '<li>Level: ' . $row['level'] . "</li><br />";
		echo '<div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">'. $row['experience'] . '/200 EXP
  </div>
</div>';
		}
		?>
    </div>
    <div id="inventory" class="tab-pane fade">
	  <h3>Inventory</h3>
	  <?php
      foreach ($db->query("SELECT i.name, attribute, inv.inv_id, gold from items_in_inventory iv
 join item i On i.item_id = iv.item_id
 join inventory inv on inv.inv_id = iv.inv_id
 join avatar av on inv.avatar_id = av.character_id") as $row)
	  {
		  echo '<li>Item name:' . $row[0] . '</li>';
		  echo '<li>Item atrribute: ' . $row['attribute'] . '</li><br />';
		  echo '<li>Gold Ammount: ' . $row['gold'] . '</li><br />';	  
	  }?>
    </div>
    <div id="friends" class="tab-pane fade">
      <h3>Friends</h3>
       <?php
      foreach ($db->query("SELECT name, level from avatar") as $row)
	  {
		  echo '<li>' . $row['name'];
		  echo ' Level: ' . $row['level'] . '</li><br />';
		  
	  }?>
    </div>
    <div id="accountInfo" class="tab-pane fade">
      <h3>Account Info</h3>
      <p>hi there! This tab will have more account info in the future!</p>
    </div>
  </div>
</div>

</body>
</html>
