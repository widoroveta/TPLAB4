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



    public function add($company)
    {
        if(!$this->validateCuit($company->getCuit())) {
            $sqlQuery = "INSERT INTO company (companyId,nameCompany,city,address,size,email,phoneNumber,cuit) VALUES (:companyId,:nameCompany,:city,:address,:size,:email,:phoneNumber,:cuit)";
            $parameters['companyId'] = $company->getCompanyId();
            $parameters['nameCompany'] = $company->getNameCompany();
            $parameters['city'] = $company->getCity();
            $parameters['address'] = $company->getAddress();
            $parameters['size'] = $company->getSize();
            $parameters['email'] = $company->getEmail();
            $parameters['phoneNumber'] = $company->getPhoneNumber();
            $parameters['cuit'] = $company->getCuit();
            try {
                $this->conecction = Connection::GetInstance();
                return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
        return null;
    }
    public  function searchByCuit($cuit)
    {  $sqlQuery="select * from company where (cuit = :cuit)";
        $parameters['cuit']=$cuit;
        try {
            $this->conecction = Connection::GetInstance();
            $resultSet= $this->conecction->Execute($sqlQuery, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
        if(!empty($resultSet))
        {
            $company = $this->mapout($resultSet);
        }
        else
        {
            $company = false;
        }

        return $company;
    }
    public function validateCuit($cuit){
        $sqlQuery="select companyId from company where (cuit = :cuit)";
        $parameters['cuit']=$cuit;
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->Execute($sqlQuery, $parameters, 0);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return null;
    }

    public function Delete($id)
    {
        $sqlquery = "DELETE FROM company WHERE (companyId = :id)";
        $parameters["id"] = $id;
        try {



            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyName($id, $name)
    {
        $sqlquery = "UPDATE company  SET nameCompany = :name WHERE (companyId = :id)";
        $parameters["name"] = $name;
        $parameters["id"] = $id;
        try {

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyCity($id, $city)
    {
        $sqlquery = "UPDATE company SET city = :city WHERE (companyId = :id)";
        $parameters["city"] = $city;
        $parameters["id"] = $id;
        try {


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }

    }

    public function modifyAddress($id, $address)
    {
        $sqlquery = "UPDATE company SET address = :address WHERE (companyId = :id)";
        $parameters["address"] = $address;
        $parameters["id"] = $id;
        try {


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifySize($id, $size)
    {
        $sqlquery = "UPDATE company SET size = :size WHERE (companyId = :id)";
        $parameters["size"] = $size;
        $parameters["id"] = $id;
        try {


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyEmail($id, $email)
    {
        $sqlquery = "UPDATE company SET email = :email WHERE (companyId = :id)";
        $parameters["email"] = $email;
        $parameters["id"] = $id;
        try {
            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyPhoneNumber($id, $phoneNumber)
    {
        $sqlquery = "UPDATE company SET phoneNumber = :phoneNumber WHERE (companyId = :id)";
        $parameters["phoneNumber"] = $phoneNumber;
        $parameters["id"] = $id;

        try {

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
// TODO same validation at the add
    public function modifyCuit($id, $cuit)
    {
        $sqlquery = "UPDATE company SET cuit = :cuit WHERE `companyId` = :id";
        $parameters["cuit"] = $cuit;
        $parameters["id"] = $id;
        try {

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }


    function searchById($id)
    {


        $sqlQuery = "SELECT * FROM company WHERE (companyId = :companyId)";
        $parameters["companyId"] = $id;
        try {
            $this->conecction = Connection::GetInstance();
            $resultSet= $this->conecction->Execute($sqlQuery, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
        if(!empty($resultSet))
        {
            $company = $this->mapout($resultSet);
        }
        else
        {
            $company = false;
        }

        return $company;
    }

    function searchByName($name)
    {
    

        $sqlQuery = "SELECT * FROM company WHERE(nameCompany = :name)";
        $parameters["name"] = $name;
        try {
            $this->conecction = Connection::GetInstance();
            $resultSet= $this->conecction->Execute($sqlQuery, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
        if(!empty($resultSet))
        {
            $company = $this->mapout($resultSet);
        }
        else
        {
            $company = false;
        }

        return $company;
    }

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