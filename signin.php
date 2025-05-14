<?php

require_once ('user.php');

// date of course 
date_default_timezone_set('America/Toronto');
$date = date('Y-m-d H:i:s');

// initialize message vars
$error = "";
$success = "";

// handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password)) {
    $error = "All fields are required.";
  } else {
    try {
      $user = new User();
      $db = db_connect();

      // get user from the db
      $statement = $db->prepare("SELECT * FROM users WHERE username = :username;");
      $statement->bindParam(':username', $username);
      $statement->execute();
      $result = $statement->fetch(PDO::FETCH_ASSOC);

      if(!$result) {
        $error = "Username not found, awkward";
      } elseif (!password_verify($password, $result['password'])) { // password_verify method as indicated in assignment instructions
        $error = "Incorrect password, try again.";
      } else {
        $sucess = "Login successful! Redirecting to home page...";
        header('Location: home.php'); // redirect to home page
        exit();
      }
    } catch (PDOException $e) {
      $error = "Database error: " . $e->getMessage();
    }
  }
}
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

         <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <input type="button" value="Back" onclick="window.location.href='index.php'" />
      </form>
    </div>
    
    <div class="footer">
      Assignment 2 - COSC4806 - Jessica Garcia
    </div>
  </body>
</html>