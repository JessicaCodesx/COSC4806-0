<?php
// start session to access session vars
session_start();

;// check if the user is logged in
if(!isset($_SESSION['user'])) {
  // if not logged in redirect to login page
  header('Location: login.php');
  exit();
}
?>

<html>
  <head>
    <title>Welcome</title>
  </head>
  <body>
      <h2>Welcome to the website!</h2>

  </body>
</html>