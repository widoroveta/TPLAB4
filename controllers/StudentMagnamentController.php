<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use DAO\StudentDAO as StudentDAO;
use Models\Career as Career;
use Models\Student as Student;


class StudentMagnamentController
{

    private $studentDAO;
    private $careerDAO;
    public function login($email, $password)
    {
     

        $this->studentDAO = StudentDAO::getInstance();
        $this->careerDAO= new CareerDAO();
        $std = $this->verifyEmail($email);

        if ($std != null) {

            if ($std->getActive()) {

                $message = "Usario encontrado";
                $std->setCareer($this->careerDAO->searchById($std->getCareer()));
                $_SESSION["loggedUser"] = $std;

                header("location:" . FRONT_ROOT . "home/showHomeLogin?varMessage=$message");
            } else {

                $message = "Usuario no activo";

                header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
            }
        } else {
                if($email=="admin")
        {
            header("location:".FRONT_ROOT."admin/showHomeAdmin");
        }else{
            $message = "Usuario no encontrado";
            header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
        }
        }
    }
    public function verifyEmail($email)
    {
        $this->studentDAO = StudentDAO::getInstance();

        $std = $this->studentDAO->searchByEmail($email);
        if ($std != null) {
            return $std;
        }
        return null;
    }
}
