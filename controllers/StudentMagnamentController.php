<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\AppointmentOldDAO;
use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\UserDAO;
use Models\Appointment;
use Models\AppointmentOld;
use Models\Career as Career;
use Models\JobPosition;
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
       if($name!=''){
        $aux=$this->companyDAO->searchByName($name);

        if ($aux!=null) {
            $companySelected = $aux;
        }else{
                unset($companySelected);
            }
        }
        $c=$this->companyDAO->getAll();
        $companyList = $c!=null?$c:array() ;

        require_once(VIEWS_PATH . "Student/list-company.php");
    }

    public
    function showJobOfferList()
    {
        $this->validateSession();
        $career=$_SESSION['loggedUser']->getCareer()->getCareerId();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobPosition=JobPositionDAO::getInstance();
        $jobPositionList=$jobPosition->getAllByCareer($career);
        $jobOfferList=$jobOfferDAO->getAllByJobPositions($jobPositionList);


        $jobOfferList=$jobOfferList!=null?$jobOfferList:array();
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
        $fileList=$fileList!=null?$fileList:array();
        require_once (VIEWS_PATH."student/list-Appointment.php");
    }


    public  function  addAppointment($jobOfferId,$studentId,$message){
        $this->validateSession();
        $appointmentDAO=AppointmentDAO::getInstance();
        $appointmentOldDAO=AppointmentOldDAO::getInstance();
        $file=$_FILES['file'];

        try {

            
            $fileName = $file["name"];
            $tempFileName = $file["tmp_name"];
            $type = $file["type"];
            $filePath = UPLOADS_PATH.basename($fileName);
            $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            move_uploaded_file($tempFileName,$filePath);
            $a=new Appointment(0,$studentId,$jobOfferId,$filePath,$message);
           $appointment= $appointmentDAO->add($a);

           if($appointment) {
               $appointmentSelect=$appointmentDAO->maxId();

             $id=$appointmentSelect['0']->getAppointmentId();
               $company=$appointmentSelect['0']->getJobOffer()->getCompany()->getNameCompany();
               $student=$appointmentSelect['0']->getStudent()->getEmail();
               $jobPosition=$appointmentSelect['0']->getJobOffer()->getJobPosition()->getDescription();
               $career=$appointmentSelect['0']->getJobOffer()->getJobPosition()->getCareer()->getDescription();
               $date=$appointmentSelect['0']->getDate();
              $appointmentOld=new AppointmentOld($id,$company,$student,$jobPosition,$career,$date);
                $appointmentOldDAO->add($appointmentOld);
               $message = 'Postulacion realizada con exito.';
           }else{
               $message='Postulacion con error revise si ya tiene una postulacion';
           }
          //  header('location:'.FRONT_ROOT."StudentMagnament/showListAppointment?varMessage=$message");
           $this->showListAppointment($message);
        }
        catch (\Exception $ex)
        {
            throw $ex;
        }
    }
}
