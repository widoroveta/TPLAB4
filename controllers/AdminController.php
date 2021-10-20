<?php
namespace Controllers;


class AdminController{
 
    public function showListCompany(){
        $this->validateAdmin();
        require_once(VIEWS_PATH."Admin/list-company.php");
    }
    public function showListStudent(){
        $this->validateAdmin();
        require_once(VIEWS_PATH."Admin/list-student.php");
    }
    public function showAddCompany()
{    $this->validateAdmin();
    require_once(VIEWS_PATH."Admin/add-company.php");
}
 private function validateAdmin()
 {
     require_once(VIEWS_PATH."Admin/Validate-admin.php");
 }
}
