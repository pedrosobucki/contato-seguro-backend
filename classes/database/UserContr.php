<?php

  require_once 'Mysql.php';

  class UserContr{
    
    private $mysql;

    public function __construct(){
      $database = new MySql();
      $this->mysql = $database->connect();
    }

    public function insertUser($data){

      $query = 'INSERT INTO user ('.implode(', ', array_keys($data)).'),
                VALUES ("'.implode('", "', $data).'")';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return ($stmt->rowCount() > 0) ? $this->mysql->lastInsertId() : false;

    }

    public function getUser($id_user){

      $query = '  SELECT  *
                  FROM    user
                  WHERE   id_user = "'.$id_user.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
      
    }

    public function getAllUsers(){

      $query = '  SELECT  *
                  FROM    user
                  WHERE user.show = 1';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }

    public function updateUser($id_user, $data){

      foreach ($data as $key => $value) {
        $values[] = $key.' = "'.$value.'"';
      }

      $query = 'UPDATE user
                SET '.implode(', ', $values).'
                WHERE user.id_user = "'.$id_user.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->rowCount();
    }

    public function deleteUser($id_user){

      $query = 'UPDATE user
                SET show = 0
                WHERE user.id_user = "'.$id_user.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->rowCount();
    }

  }

?>