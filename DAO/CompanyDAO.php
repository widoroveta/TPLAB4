<?php

namespace DAO;

use Models\Company as Company;

class CompanyDAO
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
   private function higherId(){
    $idMax=0;
        foreach ($this->companyList as $c)
        {
            if($c->getCompanyId()>$idMax)
            $idMax=$c->getCompanyId();
        }
        return $idMax;
    }
    public function add($company)
    { $c=0;
        $this->retrieveData();

        if ($company instanceof Company && $company != null) {
           if(!empty($this->companyList)) {

               $c=$this->higherId();

               $company->setCompanyId(++$c);
           }else{
               $company->setCompanyId(0);
           }
            array_push($this->companyList, $company);
        }
        $this->saveData();
    }

    private function retrieveData()
    {
        $this->companyList = array();
        $jsonPath=$this->fileName;
        if(file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
           if(is_array($arrayToDecode) ) {
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
           }else{
               array_push($this->companyList,$company);
           }

        }
    }
    public function delete($id){
        $this->retrieveData();
        $company=$this->searchById($id);
        $key=array_search($company,$this->companyList);
        echo $key;
        unset($this->companyList[$key]);
        $this->saveData();
    }
    public function modifyName($id,$name){
        $this->retrieveData();
        $company=$this->searchById($id);
        $key=array_search($company,$this->companyList);
        $company->setNameCompany($name);
        $this->companyList[$key]=$company;
        $this->saveData();

    }
    public function modifyCity($id,$city){
        $this->retrieveData();
        $company=$this->searchById($id);
        $key=array_search($company,$this->companyList);
        $company->setCity($city);
        $this->companyList[$key]=$company;
        $this->saveData();

    }
    public function modifyAddress($id,$address){
        $this->retrieveData();
        $company=$this->searchById($id);
        $key=array_search($company,$this->companyList);
        $company->setAddress($address);
        $this->companyList[$key]=$company;
        $this->saveData();

    }
    public function searchById($id){
        $this->retrieveData();
        foreach ($this->companyList as $company) {
            if($company->getCompanyId()==$id)
            {
                return $company;
            }
        }
    }
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
    public  function  getAll(){
        $this->retrieveData();
        return $this->companyList;
    }





}