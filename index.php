<?php
// start session to access session vars
session_start();

;// check if the user is logged in
if(!isset($_SESSION['user'])) {
  // if not logged in redirect to login page
  header('Location: login.php');
  exit();
}

  // get current date (???? why is this set for tomorrow where am i ???????)
  $date = date('Y-m-d H:i:s');
?>

<html>
  <head>
    <title>Welcome</title>
  </head>
  <body>
      <h1>Welcome to the website!</h1>
    <h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
    <h3>Today is <?php echo $date; ?></h3>

    <!-- link to logout -->
    <a href="logout.php">Logout</a>
  </body>
</html>