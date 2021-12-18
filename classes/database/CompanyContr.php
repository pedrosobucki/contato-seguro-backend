<?php

  require_once 'Mysql.php';

  class CompanyContr{

    private $mysql;

    public function __construct(){
      $database = new Mysql();
      $this->mysql = $database->connect();
    }

    public function getCompany($id_company){

      $query = '  SELECT *
                  FROM company
                  WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function getAllCompanies(){

      $query = '  SELECT *
                  FROM company
                  WHERE company.show = 1';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCompany($companyData, $adressData){

      $query = 'INSERT INTO adress('.implode(', ', array_keys($adressData)).')
                VALUES ("'.implode('", "', $adressData).'")';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        $adressCreated = true;
        $companyData['id_adress'] = $this->mysql->lastInsertId();

        $query = 'INSERT INTO company('.implode(', ', array_keys($companyData)).')
                  VALUES ("'.implode('", "', $companyData).'")';

        $stmt = $this->mysql->prepare($query);
        $stmt->execute();

        $companyCreated = ($stmt->rowCount() > 0) ? true : false;
      }else{
        $adressCreated = false;
      }

      return ($adressCreated && $companyCreated) ? true : false;
      
    }

  }

?>