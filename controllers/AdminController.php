<?php
namespace Controllers;


use DAO\CareerDAO;
use DAO\CompanyDAO;
use DAO\StudentDAO;

class AdminController{
 
    public function showListCompany(){
        $this->validateAdmin();
        $companyDAO=CompanyDAO::getInstance();
        $companyList= $companyDAO->getAll();

        require_once(VIEWS_PATH."Admin/list-company.php");
    }
    public function showListStudent(){
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $studentList = $studentDAO->getAll();
        require_once(VIEWS_PATH."Admin/list-student.php");
    }
    public function showAddCompany()
{    $this->validateAdmin();
    require_once(VIEWS_PATH."Admin/add-company.php");
}
public function showPanelModifyCompany($id){
        $companyDAO=CompanyDAO::getInstance();
        $company=$companyDAO->searchById($id);
        require_once (VIEWS_PATH."Admin/modifyViewCompany.php");
}
public function deleteCompany($id)
{
    $this->validateAdmin();;
    $companyDAO=CompanyDAO::getInstance();
    $companyDAO->delete($id);
    $this->showListCompany();
}
public function modifyName($id){
        $companyDAO=CompanyDAO::getInstance();

}
 private function validateAdmin()
 {
     require_once(VIEWS_PATH."Admin/Validate-admin.php");
 }
}
