<?php

  include_once(realpath(__DIR__, 1).'/inc.inc.connect.php');

  class MySql{

    private $conn;

    public function __construct(){
      $this->connect();
    }

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