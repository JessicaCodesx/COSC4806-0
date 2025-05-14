<?php

require_once ('config.php'); // loads db config 

// creating a PDO connection to the db
function db_connect() {
  try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
    // return db connection if successful 
    return $dbh;
  } catch (PDOException $e) {
    // global var to indiciate db is down
    global $db_down;
    $db_down = true;
    //log error msg
    error_log("Database connection failed :( : " . $e->getMessage());
    // return false to indicate connection failed
    return false;
  }
}
?>