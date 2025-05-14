<?php

require_once ('database.php'); // we need the db connection ofc

Class User {

  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users;");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
  }
  
}











?>