<?php
    namespace Controllers;
    class HomeController{

        public function index(){
            require_once(VIEWS_PATH.'home.php');
        }
        public function login ($userName,$password){
                require_once(VIEWS_PATH."home-login.php");
                //session_start();
                $_SESSION["loggedUser"]="messi";
   
        }
        public function register(){
          
        }
        public function logout(){
      
            $_SESSION['loggedUser'] = null;
            session_destroy();
          $this->index();
        
        }
    }
?>