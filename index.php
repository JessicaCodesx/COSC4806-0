<?php
session_start(); // start session to access session vars

// if user is already authenticated redirect to home page
if (isset($S_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
  header('Location: home.php'); // this is a placeholder home page for now because idk whats going on
  exit();
}

  // display the date still for personal vindication since i did all this work to fix it
  date_default_timezone_set('America/Toronto');
  $date = date('Y-m-d H:i:s');
?>

<html>
  <head>
    <title>Welcome</title>
    <!-- linking external css sheet to prevent being blinded by css -->
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class ="main-container">
      <h1>Welcome to... this! </h1>
      <p>It's currently <?php echo $date;?></p>
      <p>Please <a href="signin.php">Sign In</a> or <a href="signup.php"> Sign Up</a> to continue.</p>
    </div>

    <div class="footer">
      Assignment 2 - COSC4806 - Jessica Garcia
    </div>
  </body>
</html>