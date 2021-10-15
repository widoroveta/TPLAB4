<?php
namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;


class StudentMagnamentController{

    private $studentDAO;
   public function __construct()
   {
       $this->studentDAO=new StudentDAO();
       
   }
    public function login($email,$password){

        $std=$this->verifyEmail($email);
        if($std!=null)
        {
            if($std->getActive())
        {
            
         
            
               $message="Usario encontrado"; 
               
         
            $_SESSION["loggedUser"]=$std;
               header("location:".FRONT_ROOT."home/showHomeLogin?varMessage=$message");
        }
        else{
            
            $message="Usuario no activo"; 
            header("location:".FRONT_ROOT."home/index?varMessage=$message");
        }
        }else{
           
            $message="Usuario no encontrado"; 
            header("location:".FRONT_ROOT."home/index?varMessage=$message");
        }

        
    }   
    public function verifyEmail($email)
    {
        $std=$this->studentDAO->searchByEmail($email);
        if($std!=null)
        {
            return $std;
        }
        return null;
    }
}
?>