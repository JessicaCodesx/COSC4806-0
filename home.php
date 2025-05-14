<?php
session_start(); // access session vars

// if user is not authenticated redirect to login page
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  header('Location: signin.php');
  exit();
}

?>

<html>
  <head>
    <title>Home</title>
    <!-- linking external css sheet to prevent being blinded by css -->
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class ="main-container">
      <h1>...hi </h1>

      <form>
        <input type="button" value="Logout" onclick="window.location.href='logout.php'" />
      </form>
    </div>

    <div class="footer">
      Assignment 2 - COSC4806 - Jessica Garcia
    </div>
  </body>
</html>