<?php

  include_once(dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.connect.php');

  class MySql{

    private $conn;

    public function connect(){
      
      $this->conn = null;

      try{
        $this->conn = new PDO(
          'mysql:host='.HOST.';
          dbname='.DB,
          USER,
          PASS
        );

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(Exception $e){
        echo 'Connection error: '.$e->getMessage();
      }

      return $this->conn;
    }

  }

?>