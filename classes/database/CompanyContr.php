<?php

  require_once 'Mysql.php';

  class CompanyContr{

    private $mysql;

    public function __construct(){
      $database = new Mysql();
      $this->mysql = $database->connect();
    }

    public function getCompany($id_company){

      $query = '  SELECT  company.id_company,
                          company.name,
                          company.cnpj,
                          company.show,
                          adress.*

                  FROM company LEFT JOIN adress
                  ON company.id_adress = adress.id_adress

                  WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        $response = array(
                          "status" => 200,
                          "data" => $stmt->fetch(PDO::FETCH_ASSOC)
                        );
      }else{
        $response = NO_CONTENT;
      }

      return $response;

    }

    public function getAllCompanies(){

      $query = '  SELECT  company.id_company,
                          company.name,
                          company.cnpj,
                          company.show,
                          adress.*

                  FROM company LEFT JOIN adress
                  ON company.id_adress = adress.id_adress

                  WHERE company.show = 1';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCompany($companyData, $adressData){

      $query = 'INSERT INTO company('.implode(', ', array_keys($companyData)).')
                VALUES ("'.implode('", "', $companyData).'")';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return ($stmt->rowCount() > 0) ? $this->mysql->lastInsertId() : false;
      
    }

    public function updateCompany($id_company, $data){

      foreach ($data as $key => $value) {
        $values[] = $key.' = "'.$value.'"';
      }

      $query = 'UPDATE company
                SET '.implode(', ', $data).'
                WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return ($stmt->rowCount() > 0) ? true : false;

    }

    public function deleteCompany($id_company){

      $query = 'UPDATE company
                SET show = 0
                WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->rowCount();

    }

  }

?>