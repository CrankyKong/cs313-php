<!DOCTYPE html>
<html lang="en">
<head>
  <title>Videos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/style.css">
   </head>
<body id="home">
<?php 
	require("navbar.php");
	display();
	
?>
<br />
<br />
<br />
 <div>
  <h1>Videos</h1>
  <p>Click on the video links to gain experience!</p>
  
  </div>
  <div>
  <button class="btn" data-toggle="modal" data-target="#myModal" value="gainExp">Video#1</button>
  </div>
  
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4></span> +100 EXP</h4>
        </div>
        <div class="modal-body">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/GKNB7Eid-ek" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
		  <?php require('gain.php');
		  gainExp();
		  ?>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>