<?php
require_once ('user.php'); // grab the user class

// cant forget to add the needless date for cool points
date_default_timezone_set('America/Toronto');
$date = date('Y-m-d H:i:s');

// initialize message vars
$error = "";
$success = "";

// handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // basic validation
  if (empty($username) || empty($password) || empty($confirm_password)) {
    $error = "All fields are required silly goose.";
  } elseif ($password !== $confirm_password) {
    $error = "Passwords don't match. Try again, type slower this time.";
  } elseif (
        // adding regular expression to validate min security reqs for password -> https://www.php.net/manual/en/function.preg-match.php
        strlen($password) < 10 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[0-9]/', $password) 
    ) { 
    $error = "Password must be at least 10 characters long and inlcue one uppercase letter, one lowercase letter, and one number. You can do it!";
  } else {
    try {
      $user = new User();

      // check if username already exists
      $existing_users = $user->get_all_users();
      foreach ($existing_users as $existing_user) {
        if($existing_user['username'] == $username) {
          throw new Exception("Someone beat ya to it, username already exists.");
        }
      }

      // if we get this far its safe to create user
      $user->create_user($username, $password);
      $success = "User created successfully! You can now <a href='login.php'>login</a>.";
    } catch (Exception $e) {
      $error = $e->getMessage();
    } catch (PDOException $e) {
      $error = "Database error: " . $e->getMessage();
    }
  }
}
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

      <?php if ($error): ?>
      <p class="error-message"><?php echo $error; ?></p>
      <?php endif; ?>

      <?php if ($success): ?>
      <p class="success-message"><?php echo $success; ?></p>
      <?php endif; ?>

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