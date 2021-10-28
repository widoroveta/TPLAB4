<?php
    namespace Controllers;
    use DAO\StudentDAO;
    use DAO\UserDAO;
  use  Models\User as User;
    class HomeController{

        public function index($message=""){

            require_once(VIEWS_PATH.'home.php');
        }
        

        public function register($email,$pass2){
                $studentDAO=StudentDAO::getInstance();
                $userDAO=UserDAO::getInstance();
                $student=$studentDAO->searchByEmail($email);
                if($student!=null )
                {
                    if($student->getActive()){
                    $user=new User();
                    $user->setStudent($student);
                    $user->setPassword($pass2);
                    $userDAO->add($user);
                    $this->index("Usuario registrado");}
                    else{
                        $this->index("Este estudiante no esta activo");
                    }
                }else{
                    $this->index("No eres un estudiante de la UTN");
                }
        }
        public function logout(){
      
            $_SESSION['loggedUser']= null;
            session_destroy();
          $this->index();
        
        }
    }
