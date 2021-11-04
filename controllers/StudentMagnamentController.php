<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO;
use DAO\JobOfferDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\UserDAO;
use Models\Appointment;
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
    public  function validateSession()
    {
        require_once(VIEWS_PATH . "Student/Validate-student.php");
    }
    public
    function showHomeStudent($message = "")
    {
     $this->validateSession();
     $student=$_SESSION['loggedUser'];
        require_once(VIEWS_PATH . "Student/home-student.php");
    }

    public
    function showListCompany($name = '')
    {
        $this->validateSession();
        $this->companyDAO = CompanyDAO::getInstance();

        if (!empty($name)) {
            $companySelected = $this->companyDAO->searchByName($name);
        }
        else{
            unset($companySelected);
        }

        $companyList = $this->companyDAO->getAll();
        require_once(VIEWS_PATH . "Student/list-company.php");
    }

    public
    function showJobOfferList()
    {
        $this->validateSession();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferList=$jobOfferDAO->getAll();
        require_once(VIEWS_PATH . "student/list-jobOffer.php");
    }
    public function showAddAppointment($id){
$this->validateSession();
        $studentId=$_SESSION['loggedUser']->getStudentId();
        require_once (VIEWS_PATH.'student/add-appointment.php');
    }
    public function showListAppointment($message=''){
        $this->validateSession();
        $appointment=AppointmentDAO::getInstance();
        $fileList=$appointment-> getAppointmentsBy($_SESSION['loggedUser']->getStudentId());

        require_once (VIEWS_PATH."student/list-Appointment.php");
    }


    public  function  addAppointment($jobOfferId,$studentId,$message){
        $this->validateSession();
        $file=$_FILES['file'];

        try {
            $appointmentDAO=AppointmentDAO::getInstance();
            
            $fileName = $file["name"];
            $tempFileName = $file["tmp_name"];
            $type = $file["type"];
            $filePath = UPLOADS_PATH.basename($fileName);
            $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            move_uploaded_file($tempFileName,$filePath);
            $a=new Appointment($studentId,$jobOfferId,$filePath,$message);
            $appointmentDAO->add($a);
            $message='Postulacion realizada con exito.';
            header('location:'.FRONT_ROOT."StudentMagnament/showListAppointment?varMessage=$message");
        }
        catch (\Exception $ex)
        {
            throw $ex;
        }
    }
}
