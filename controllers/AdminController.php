<?php
namespace Controllers;


class AdminController{
    public function showHomeAdmin(){
        $_SESSION['admin']='admin';
        require_once(VIEWS_PATH."Admin/home-admin.php");
    }
    
}
?>