<?php

  require_once(__DIR__.'/class.MySql.php');

  class UserContr{
    
    private $mysql;

    public function __construct(){
      $database = new MySql();
      $this->mysql = $database->conn;
    }

    public function insertUser($data){

      $query = 'INSERT INTO user ('.implode(', ', array_keys($data)).'),
                VALUES ("'.implode('", "', $data).'")';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->affected_rows;

    }

    public function getUser($id_user){

      $query = '  SELECT  *,
                  FROM    user
                  WHERE   id_user = "'.$id_user.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
      
    }

  }

?>