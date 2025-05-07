<?php
// start session for session variables
session_start();

// hardcode credentials 
$username = "name";
$password = "pass";

// initialize 
if (!isset($_SESSION['failed_attempts'])) {
  $_SESSION['failed_attempts'] = 0;
}

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // grab user and password 
   $user = $_POST['username'];
   $pass = $_POST['password'];

   // check if they match
   if ($user == $username && $pass == $password){
     // reset failed attempts
     $_SESSION['failed_attempts'] = 0;
     // success - redirect to index.php & save user
     $_SESSION['user'] = $user;
     // set authenticated to true for a successful sign in
     $_SESSION['authenticated'] = true;
     header('Location: index.php');
     exit();
   } else {
     // if credentials are incorrect increment failed attempts
     $_SESSION['failed_attempts']++;
   }
}
?>   

<html>
  <head>
    <title>Login</title>
  </head>
  <body>
      <h2>Login Here!</h2>
      <form action="login.php" method="post">
        <label>Username :</label>
        <input type="text" name="username" required><br>

        <label>Password :</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
      </form>

  </body>
</html>