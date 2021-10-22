<?php

namespace Controllers;

use DAO\CompanyDAO;
use Models\Company as Company;

class CompanyMagnamentController
{
 private $companyDAO;
    public function addCompany($nameCompany,$city,$address,$size,$email,$phoneNumber,$CUIT){
        $companyDAO=CompanyDAO::getInstance();
     header("location".FRONT_ROOT."Admin/validateAdmin");
     $company =new Company();
     $company->setNameCompany($nameCompany);
     $company->setCity($city);
     $company->setAddress($address);
     $company->setSize($size);
     $company->setEmail($email);
     $company->setPhoneNumber($phoneNumber);
     $company->setCuit($CUIT);
     $companyDAO->add($company);
    header("location:".FRONT_ROOT."Admin/showAddCompany");
    }
    public function listCompany(){
        $this->companyDAO=CompanyDAO::getInstance();
        return $this->companyDAO->getAll();
    }
}