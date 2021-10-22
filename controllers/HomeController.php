<?php
    namespace Controllers;
    class HomeController{

        public function index($message=""){

            require_once(VIEWS_PATH.'home.php');
        }
        

        public function register(){
          
        }
        public function logout(){
      
            $_SESSION['loggedUser']= null;
            session_destroy();
          $this->index();
        
        }
    }
