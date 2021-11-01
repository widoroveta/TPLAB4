<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO;
use DAO\JobOfferDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\UserDAO;
use Models\Career as Career;
use Models\Student as Student;
use Models\User as User;


class StudentMagnamentController
{

    private $studentDAO;
    private $careerDAO;
    private $userDAO;

    public function login($email, $password)
    {
        $this->userDAO = UserDAO::getInstance();
        $this->studentDAO = StudentDAO::getInstance();
        $this->careerDAO = CareerDAO::getInstance();
        $std = $this->verifyEmail($email);


        if ($std != null) {

            if ($std->getActive()) {


                $std->setCareer($this->careerDAO->searchById($std->getCareer()));
                $user = new User();
                $user = $this->userDAO->searchByStudentId($std->getStudentId());


                if ($user != null) {

                    $_SESSION["loggedUser"] = $std;
                    $message = "Usuario encontrado";
                    $this->showHomeStudent($message);
                } else {
                    $message = 'Deberias registrarte';
                    header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
                }
            } else {

                $message = "Usuario no activo";

                header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
            }
        } else {
            $user = $this->userDAO->searchByEmail($email);
            if ($user->getAdmin()) {
                if (strcasecmp($user->getPassword(), $password) == 0) {
                    $_SESSION['loggedUser']='admin';
                    header("location:".FRONT_ROOT."Admin/showListCompany");
                } else {
                    $message = "Contraseña incorrecta";
                    header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
                }
            } else {
                $message = "Usuario no encontrado";
                header("location:" . FRONT_ROOT . "home/index?varMessage=$message");
            }
        }
    }

    public
    function verifyEmail($email)
    {
        $this->studentDAO = StudentDAO::getInstance();

        $std = $this->studentDAO->searchByEmail($email);
        if ($std != null) {
            return $std;
        }
        return null;
    }

    public
    function showHomeStudent($message = "")
    {
        require_once(VIEWS_PATH . "Student/Validate-student.php");
        require_once(VIEWS_PATH . "Student/home-student.php");
    }

    public
    function showListCompany($name = '')
    {
        $this->companyDAO = CompanyDAO::getInstance();

        if (!empty($name)) {
            $companySelected = $this->companyDAO->searchByName($name);
        }

        $companyList = $this->companyDAO->getAll();
        require_once(VIEWS_PATH . "Student/list-company.php");
    }

    public
    function showJobOfferList()
    {
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferList=$jobOfferDAO->getAll();
        require_once(VIEWS_PATH . "student/list-jobOffer.php");
    }
    public function showAddAppointment(){
        require_once (VIEWS_PATH.'student/add-appointment.php');
    }
}
