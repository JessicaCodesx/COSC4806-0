<?php

// start session to access session vars
session_start();

// destory session data and redirect to login
session_destroy();
header('Location: index.php');
exit();

?>