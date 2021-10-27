<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO;
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
        $this->careerDAO = CareerDAO::getInstance();
        $std = $this->verifyEmail($email);


        if ($std != null) {

            if ($std->getActive()) {

                $message = "Usuario encontrado";
                $std->setCareer($this->careerDAO->searchById($std->getCareer()));
                $_SESSION["loggedUser"] = $std;

                $this->showHomeStudent($message);
            } else {

                $message = "Usuario no activo";

                header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
            }
        } else {
            if ($email == "admin") {
                $_SESSION['loggedUser'] = 'admin';
                header("location:" . FRONT_ROOT . "Admin/showListCompany");
            } else {
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

    public function showHomeStudent($message = "")
    {
        require_once(VIEWS_PATH . "Student/Validate-student.php");
        require_once(VIEWS_PATH . "Student/home-student.php");
    }

    public function showListCompany($name = '')
    {
        $this->companyDAO = CompanyDAO::getInstance();

            if (!empty($name)) {
                $companySelected = $this->companyDAO->searchByName($name);
            }

        $companyList = $this->companyDAO->getAll();
        require_once(VIEWS_PATH . "Student/list-company.php");
    }
    public function showJobOfferList(){

        require_once (VIEWS_PATH."student/list-jobOffer.php");
    }
}
