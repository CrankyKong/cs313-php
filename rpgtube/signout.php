<?php
session_start();

session_unset();
session_destroy();
echo '<h1>Sign out successful!</h1>';
echo '<a href="index.php#home">HOME</a>';
?>