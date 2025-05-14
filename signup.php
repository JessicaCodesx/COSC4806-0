<?php
require_once ('user.php'); // grab the user class


// cant forget to add the needless date for cool points
date_default_timezone_set('America/Toronto');
$date = date('Y-m-d H:i:s');

?>
<html>
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class ="signup-container">
      <h1>Let's get you signed up !!!</h1> 
      <p>By the way, it's currently <?php echo $date;?></p>
      <form action="signup.php" method="post">
        <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="password" name="confirm_password" placeholder="Confirm Password" required />
          <input type="submit" value="Sign Up" />
      </form>
    </div>
    <div class="footer">
      Assignment 2 - COSC4806 - Jessica Garcia
    </div>
  </body>
</html>