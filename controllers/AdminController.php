<?php
namespace Controllers;


class AdminController{
 
    public function showListCompany(){
        require_once(VIEWS_PATH."Admin/Validate-admin.php");
        require_once(VIEWS_PATH."Admin/list-company.php");
    }
    public function showListStudent(){
        require_once(VIEWS_PATH."Admin/Validate-admin.php");
        require_once(VIEWS_PATH."Admin/list-student.php");
    }
    public function showAddCompany()
{    require_once(VIEWS_PATH."Admin/Validate-admin.php");
    require_once(VIEWS_PATH."Admin/add-company.php");
}
}
