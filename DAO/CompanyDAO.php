<?php

namespace DAO;

use Models\Company;

class CompanyDAO extends DAO
{
    private $companyList;
    protected static $instance = null;

    public function __construct()
    {
        $this->fileName = DATA_PATH . "Company.json";
        $this->companyList = array();
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
        $this->retrieveData();
        if ($company instanceof Company && $company != null) {
            array_push($this->companyList, $company);
        }
        $this->saveData();
    }

    public function retrieveData()
    {
        $this->companyList = array();
        $jsonPath = $this->getJsonFilePath();
        $jsonContent = file_get_contents($jsonPath);
        $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
        foreach ($arrayToDecode as $arrayValue) {
            $company = new Company();
            $company->setCompanyId($arrayValue['companyId']);
            $company->setNameCompany($arrayValue['nameCompany']);
            $company->setCity($arrayValue['city']);
            $company->setAddress($arrayValue['adress']);
            $company->setSize($arrayValue['size']);
            $company->setEmail($arrayValue['email']);
            $company->setPhoneNumber($arrayValue['phoneNumber']);
            $company->setCuit($arrayValue['cuit']);
            array_push($this->companyList, $company);
        }


    }

    public function saveData()
    {
        $arrayToEncode = array();
        $jsonPath = $this->getJsonFilePath();

        foreach ($this->companyList as $company) {
            $arrayValue['companyId'] = $company->getCompanyId();
            $arrayValue['nameCompany'] = $company->getNameCompany();
            $arrayValue['city'] = $company->getCity();
            $arrayValue['adress'] = $company->getAdress();
            $arrayValue['size'] = $company->getSize();
            $arrayValue['email'] = $company->getEmail();
            $arrayValue['phoneNumber'] = $company->getPhoneNumber();
            $arrayValue['cuit'] = $company->getCuit();

            array_push($arrayToEncode, $arrayValue);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($jsonPath, $jsonContent);

    }




    function getJsonFilePath()
    {
        $initialPath = "Data/Company.json";

        if (file_exists($initialPath)) {
            $jsonFilePath = $initialPath;
        } else {
            $jsonFilePath = "../" . $initialPath;
        }

        return $jsonFilePath;
    }
}