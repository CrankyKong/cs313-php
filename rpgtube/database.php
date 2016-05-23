<?php
function loadDatabase()
{
  $dbHost = 'localhost';
  $dbUser = 'php';
  $dbPassword = 'pass';

  $dbName = 'rpgtube';
  try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
  } catch (Exception $e) {
    echo $e;
    die();
  }

  return $db;
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My database</title>
  </head>
  <body>
    <h1>User</h1>
   


    <?php
    $db = loadDatabase();

    
      foreach ($db->query("SELECT * FROM user") as $row)
      {
        echo "<p>" . $row['id'] . " username: ";
        echo $row['username'];
        echo " password:" . $row['password'] . "<br/></p>";
      }
    

     ?>
  </body>
</html>