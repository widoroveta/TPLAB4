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


    public function validateSession()
    {
        require_once(VIEWS_PATH . "Student/Validate-student.php");
    }

    public
    function showHomeStudent($message = "")
    {
      //  $this->validateSession();
        $student = $_SESSION['loggedUser'];
        require_once(VIEWS_PATH . "Student/home-student.php");
    }

    public
    function showListCompany($name = '')
    {
        $this->validateSession();
        $this->companyDAO = CompanyDAO::getInstance();
        if ($name != '') {
            $aux = $this->companyDAO->searchByName($name);

            if ($aux != null) {
                $companySelected = $aux;
            } else {
                unset($companySelected);
            }
        }
        $c = $this->companyDAO->getAll();
        $companyList = $c != null ? $c : array();

        require_once(VIEWS_PATH . "Student/list-company.php");
    }

    public
    function showJobOfferList($name = '')
    {
        $this->validateSession();
        $appointment = AppointmentDAO::getInstance();
        $fileList = $appointment->getAppointmentsBy($_SESSION['loggedUser']->getStudentId());
        if (empty($fileList)) {

            $career = $_SESSION['loggedUser']->getCareer()->getCareerId();
            $jobOfferDAO = JobOfferDAO::getInstance();
            $jobPosition = JobPositionDAO::getInstance();
            $jobPositionList = $jobPosition->getAllByCareer($career);
            $jobOfferList = $jobOfferDAO->getAllByJobPositions($jobPositionList);
            if (!empty($name)) {
                foreach ($jobOfferList as $value) {
                    if (strcasecmp($value->getCompany()->getNameCompany(), $name) != 0) {
                        $key = array_search($value, $jobOfferList);
                        unset($jobOfferList[$key]);
                    }

                }
            }

            $jobOfferList = $jobOfferList ? $jobOfferList : array();
            // $jobOfferList=array();
            require_once(VIEWS_PATH . "student/list-jobOffer.php");
        } else {
            $this->showListAppointment("Usted ya tiene una postulacion cargada");
        }
    }

    public function showAddAppointment($id)
    {
        $this->validateSession();
        $studentId = $_SESSION['loggedUser']->getStudentId();
        require_once(VIEWS_PATH . 'student/add-appointment.php');
    }

    public function showListAppointment($message = '')
    {
        $this->validateSession();
        $appointment = AppointmentDAO::getInstance();
        $appointmentOldDAO = AppointmentOldDAO::getInstance();

        $fileList = $appointment->getAppointmentsBy($_SESSION['loggedUser']->getStudentId());
        $fileList = $fileList != null ? $fileList : array();
        require_once(VIEWS_PATH . "student/list-Appointment.php");
    }

    public function deleteAppointment($id)
    {

        $this->validateSession();;
        $appointmentDAO = AppointmentDAO::getInstance();
        $appointmentDAO->delete($id);
        $this->showListAppointment();
    }

    public function showHistorialAppointment()
    {
        $appointmentOldDAO = AppointmentOldDAO::getInstance();
        $aol = $appointmentOldDAO->getAllByStudent($_SESSION['loggedUser']->getEmail());
        $aol = $aol != null ? $aol : array();
        require_once(VIEWS_PATH . 'student/historial-appointment.php');
    }

    public function addAppointment($jobOfferId, $studentId, $message)
    {
        $this->validateSession();
        $appointmentDAO = AppointmentDAO::getInstance();
        $appointmentOldDAO = AppointmentOldDAO::getInstance();
        $file = $_FILES['file'];

        try {


            $fileName = $file["name"];
            $tempFileName = $file["tmp_name"];
            $type = $file["type"];
            $filePath = UPLOADS_PATH . basename($fileName);
            $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            move_uploaded_file($tempFileName, $filePath);
            $a = new Appointment(0, $studentId, $jobOfferId, $filePath, $message);
            $appointment = $appointmentDAO->add($a);

            if ($appointment) {

                $appointmentSelect = $appointmentDAO->maxId();

                $id = $appointmentSelect['0']->getAppointmentId();
                $company = $appointmentSelect['0']->getJobOffer()->getCompany()->getNameCompany();
                $student = $appointmentSelect['0']->getStudent()->getEmail();
                $jobPosition = $appointmentSelect['0']->getJobOffer()->getJobPosition()->getDescription();
                $career = $appointmentSelect['0']->getJobOffer()->getJobPosition()->getCareer()->getDescription();
                $date = $appointmentSelect['0']->getDate();
                $appointmentOld = new AppointmentOld($id, $company, $student, $jobPosition, $career, $date);
                $appointmentOldDAO->add($appointmentOld);
                $message = 'Postulacion realizada con exito.';
            } else {
                $message = 'Postulacion con error revise si ya tiene una postulacion';
            }
            //  header('location:'.FRONT_ROOT."StudentMagnament/showListAppointment?varMessage=$message");
            $this->showListAppointment($message);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
