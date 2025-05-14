<?php

require_once ('database.php'); // we need the db connection ofc

Class User {

  // func for getting all users from db
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch all rows as associative array
    return $rows;
  }

  // Func for creating new user and inserting into db
  public function create_user($username, $password) {
      $db = db_connect();

     // here we shall hash the password for security -> https://www.php.net/manual/en/function.password-hash.php
      $password = password_hash($password, PASSWORD_DEFAULT); // PASSWORD_DEFAULT uses bcrypt algorithm (for future reference (maybe (maybe not)))
  
      // prepare statement using named placeholders
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");

     // bind params to placeholders (avoiding SQL injection mwahaha)
      $statement->bindParam(':username', $username);
      $statement->bindParam(':password', $password);

     // execute statement after binding params
      $statement->execute();
      return true; // to indicate success obviously
    }
  }












?>