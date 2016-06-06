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
	require("dbConnect.php");
	$db = connectToDb();
	/*************************
	Sessions!
	************************/
	
	$user_id = $_SESSION['user_id'];
	$avatar_id = $_SESSION['avatar_id'];
	$inv_id = $_SESSION['inv_id'];
?>
<br />
<br />
<br />
<br />
<div class="container">
  <h2>Profile</h2>
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
			$percent = $row['experience'];
			$percent = ($percent/200) * 100;
		echo '<li>' . $row['name'] . "</li><br />";
		echo '<li>Level: ' . $row['level'] . "</li><br />";
		echo '<div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:'. $percent .'%">'. $row['experience'] . '/200 EXP
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
 join avatar av on inv.avatar_id = av.character_id
 where inv.inv_id = $inv_id") as $row)
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
