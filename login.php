<?php
// start session for session variables
session_start();

// if user is already logged in redirect to index.php
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
  header('Location: index.php');
  exit();
}

// hardcoded credentials 
$username = "name";
$password = "pass";

// initialize failed attempts
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
     // error message for invgalid login
     $error = "Invalid credentials. Attempt #" . $_SESSION['failed_attempts'] . ".";
   }
}
?>   

<html>
  <head>
    <title>Login</title>
    <style>
      .wrong {
        font-size: 2rem;
        font-weight: bold;
        color: red;
        background-color: yellow;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 20px;
        border: 2px solid red;
        animation: obnoxious-spin-wrong 5s linear;
      }

      @keyframes obnoxious-spin-wrong {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(1440deg); }
      }
    </style>
  </head>
  <body>
      <h2>Login Here!</h2>
      <!-- if error is set display error message -->
      <?php if (isset($error)): ?>
       <div class="wrong">
         WRONG !!1! <br><?php echo $error; ?>
       </div>
      <?php endif; ?>
    
      <form action="login.php" method="post">
        <label>Username :</label>
        <input type="text" name="username" required><br>

        <label>Password :</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
      </form>

  </body>
</html>