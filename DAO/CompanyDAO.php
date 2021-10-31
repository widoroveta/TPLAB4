<?php

namespace DAO;


use Models\Company;
use PDOException as PDOException;
use DAO\Connection as Connection;
//use Models\Company as Company;

class CompanyDAO
{
    private $companyList;
    protected static $instance = null;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new CompanyDAO();
        }

        return self::$instance;
    }

    private function higherId()
    {
        $idMax = 0;
        foreach ($this->companyList as $c) {
            if ($c->getCompanyId() > $idMax)
                $idMax = $c->getCompanyId();
        }
        return $idMax;
    }

 /*   public function add($company)
    {
        $c = 0;
        $this->retrieveData();

        if ($company instanceof Company && $company != null) {
            if (!empty($this->companyList)) {

                $c = $this->higherId();

                $company->setCompanyId(++$c);
            } else {
                $company->setCompanyId(0);
            }
            array_push($this->companyList, $company);
        }
        $this->saveData();
    }*/
    public function add($company)
    {
        $sqlQuery = "INSERT INTO company (companyId,nameCompany,city,address,size,email,phoneNumber,cuit) VALUES (:companyId,:nameCompany,:city,:address,:size,:email,:phoneNumber,:cuit)";
        $parameters['companyId'] = $company->getCompanyId();
        $parameters['nameCompany'] = $company->getNameCompany();
        $parameters['city'] = $company->getCity();
        $parameters['address'] = $company->getAddress();
        $parameters['size'] = $company->getSize();
        $parameters['email'] = $company->getEmail();
        $parameters['phoneNumber'] =$company->getPhoneNumber();
        $parameters['cuit'] =$company->getCuit();
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return null;
    }
   /* private function retrieveData()
    {
        $this->companyList = array();
        $jsonPath = $this->fileName;
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            if (is_array($arrayToDecode)) {
                foreach ($arrayToDecode as $arrayValue) {
                    $company = new Company();
                    $company->setCompanyId($arrayValue['companyId']);
                    $company->setNameCompany($arrayValue['nameCompany']);
                    $company->setCity($arrayValue['city']);
                    $company->setAddress($arrayValue['address']);
                    $company->setSize($arrayValue['size']);
                    $company->setEmail($arrayValue['email']);
                    $company->setPhoneNumber($arrayValue['phoneNumber']);
                    $company->setCuit($arrayValue['cuit']);
                    array_push($this->companyList, $company);
                }
            } else {
                array_push($this->companyList, $company);
            }

        }
    }*/

    public function Delete($id)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `status` = false WHERE `companyId` = :id";
        try {

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyName($id, $name)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `name` = :name WHERE `companyId` = :id";
        try {
            $parameters["name"] = $name;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyCity($id, $city)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `city` = :city WHERE `companyId` = :id";
        try {
            $parameters["city"] = $city;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }

    }

    public function modifyAddress($id, $address)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `address` = :address WHERE `companyId` = :id";
        try {
            $parameters["address"] = $address;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifySize($id, $size)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `size` = :size WHERE `companyId` = :id";
        try {
            $parameters["size"] = $size;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyEmail($id, $email)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `email` = :email WHERE `companyId` = :id";
        try {
            $parameters["email"] = $email;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyPhoneNumber($id, $phoneNumber)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `phoneNumber` = :phoneNumber WHERE `companyId` = :id";
        try {
            $parameters["phoneNumber"] = $phoneNumber;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyCuit($id, $cuit)
    {
        $sqlquery = "UPDATE " . $this->companyList . " SET `cuit` = :cuit WHERE `companyId` = :id";
        try {
            $parameters["cuit"] = $cuit;
            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

   /* public function searchById($id)
    {
        $this->retrieveData();
        foreach ($this->companyList as $company) {
            if ($company->getCompanyId() == $id) {
                return $company;
            }
        }
    }*/

    /*public function searchByName($name)
    {
        $this->retrieveData();
        foreach ($this->companyList as $company) {
            if ($company->getNameCompany() == $name) {
                return $company;
            }
        }
    }*/
    function searchById($id)
    {
        $companiesList = array();

        $sqlquery = "SELECT * FROM " . $this->companyList . " WHERE `companyId` LIKE '%:id%'";
        try {
            echo var_dump($sqlquery);

            $parameters["id"] = $id;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($sqlquery, $parameters);
            echo var_dump($resultSet);
            foreach ($resultSet as $row) {
                $company = new Company();
                $company->setCompanyId($row['companyId']);
                $company->setNameCompany($row['nameCompany']);
                $company->setCity($row['city']);
                $company->setAddress($row['address']);
                $company->setSize($row['size']);
                $company->setEmail($row['email']);
                $company->setPhoneNumber($row['phoneNumber']);
                $company->setCuit($row['cuit']);

                array_push($companiesList, $company);
            }
            return $companiesList[0];
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    function searchByName($name)
    {
        $companiesList = array();

        $sqlquery = "SELECT * FROM " . $this->companyList . " WHERE `nameCompany` LIKE '%:name%'";
        try {
            echo var_dump($sqlquery);

            $parameters["name"] = $name;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($sqlquery, $parameters);
            echo var_dump($resultSet);
            foreach ($resultSet as $row) {
                $company = new Company();
                $company->setCompanyId($row['companyId']);
                $company->setNameCompany($row['nameCompany']);
                $company->setCity($row['city']);
                $company->setAddress($row['address']);
                $company->setSize($row['size']);
                $company->setEmail($row['email']);
                $company->setPhoneNumber($row['phoneNumber']);
                $company->setCuit($row['cuit']);

                array_push($companiesList, $company);
            }
            return $companiesList[0];
        } catch (PDOException $ex) {
            throw $ex;
        }
    }


/*
    public function saveData()
    {
        $arrayToEncode = array();
        $jsonPath = $this->fileName;

        foreach ($this->companyList as $company) {
            $arrayValue['companyId'] = $company->getCompanyId();
            $arrayValue['nameCompany'] = $company->getNameCompany();
            $arrayValue['city'] = $company->getCity();
            $arrayValue['address'] = $company->getAddress();
            $arrayValue['size'] = $company->getSize();
            $arrayValue['email'] = $company->getEmail();
            $arrayValue['phoneNumber'] = $company->getPhoneNumber();
            $arrayValue['cuit'] = $company->getCuit();

            array_push($arrayToEncode, $arrayValue);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($jsonPath, $jsonContent);

    }
*/
    public function getAll()
    {
        $sqlQuery = "SELECT * FROM company";
        try {
            $this->connection = Connection::getInstance();

            $result = $this->connection->execute($sqlQuery);
        } catch (PDOException $ex) {
            throw $ex;
        }

        if (!empty($result)) {
            $result = $this->mapout($result);

            $companyList = array();

            if (!is_array($result)) {
                array_push($companyList, $result);
            }
        } else {
            $result = false;
        }

        if (!empty($companyList)) {
            $finalResult = $companyList;
        } else {
            $finalResult = $result;
        }

        return $finalResult;
    }

    public function mapout ($value)
    {
        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){
            $companyDAO = CompanyDAO::getInstance();
            return new Company($p['companyId'], $p['nameCompany'], $p['city'], $p['address'], $p['size'], $p['email'], $p['phoneNumber'], $p['cuit']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

}