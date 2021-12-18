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
                          company.cnpj,
                          company.show,
                          adress.*

                  FROM company LEFT JOIN adress
                  ON company.id_adress = adress.id_adress

                  WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function getAllCompanies(){

      $query = '  SELECT  company.id_company,
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

    public function updateCompany($id_company, $companyData, $adressData){

      foreach ($companyData as $key => $value) {
        $companyValues[] = $key.' = "'.$value.'"';
      }

      foreach ($adressData as $key => $value) {
        $adressValues[] = $key.' = "'.$value.'"';
      }

      $query = 'UPDATE company
                SET '.implode(', ', $companyValues).'
                WHERE company.id_company = "'.$companyValues.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      $companyUpdated = ($stmt->rowCount() > 0) ? true : false;

      $query = 'UPDATE adress
                SET '.implode(', ', $adressValues).'
                WHERE company.id_company = "'.$adressValues.'"';

      $stmt = $this->mysql->prepare($query);
      $stmt->execute();

      $adressUpdated = ($stmt->rowCount() > 0) ? true : false;

      return ($adressUpdated && $companyUpdated) ? true : false;

    }

    public function deleteCompany($id_company){

      $query = 'UPDATE company
                SET show = 0
                WHERE company.id_company = "'.$id_company.'"';

      $stmt = $this->mysql0->prepare($query);
      $stmt->execute();

      return $stmt->rowCount();

    }

  }

?>