<?php
// date of course 
date_default_timezone_set('America/Toronto');
$date = date('Y-m-d H:i:s');

// initialize message vars
$error = "";
$success = "";
?>

<html>
  <head>
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class ="signin-container">
      <h1>Welcome back </h1> 
      <p>Did you know it's currently <?php echo $date;?> ?</p> 

      <?php if ($error): ?>
      <p class="error-message"><?php echo $error; ?></p>
      <?php endif; ?>

      <?php if ($success): ?>
      <p class="success-message"><?php echo $success; ?></p>
      <?php endif; ?>

      <form action="signin.php" method="post">
        <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="submit" value="Sign In" />
      </form>
    </div>
    
    <div class="footer">
      Assignment 2 - COSC4806 - Jessica Garcia
    </div>
  </body>
</html>