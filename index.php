<?php
require_once ('user.php');

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>";
print_r($user_list);

?>

<html>
  <head>
    <title>Welcome</title>
    <!-- adding pizzazz -->
    <style>
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