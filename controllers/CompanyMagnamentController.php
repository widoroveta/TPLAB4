<?php

namespace Controllers;

use DAO\CompanyDAO;

class CompanyMagnamentController
{
 private $companyDAO;
    public function addCompany(){
        $companyDAO=CompanyDAO::getInstance();
     header("location".FRONT_ROOT."Admin/validateAdmin");
    }
}