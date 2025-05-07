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
    <!-- adding pizzazz -->
    <style>
      body {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        background-color: #fff95f;
        color: #333;
        text-align: center;
        padding-top: 50px;
      }

      h1 {
        color: #ff6b6b;
        font-size: 2.5em;
      }

      h2 {
        color: #4ecdc4;
        margin-top: 10px;
      }

      h3 {
        color: #ffa502;
        margin-top: 5px;
      }

      a {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #ff6b6b;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
      }

      .spin-in {
        display: inline-block;
        animation: spin-in 1s ease-in-out;
      }

      @keyframes spin-in {
        0% {
          transform: rotate(-360deg);
          opacity: 0;
          scale: 0.5;
        }
        100% {
          transform: rotate(0deg);
          opacity: 1;
          scale: 1;
        }
      }
    </style>
  </head>
  <body>
      <h1 class="spin-in">Welcome to whatever this is!</h1>
    <h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
    <h3>Today is <?php echo $date; ?></h3>
    <h4> Assignment 1 - COSC4806 - Jessica Garcia </h4>

    <!-- link to logout -->
    <a href="logout.php">Logout</a>
  </body>
</html>