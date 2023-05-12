<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\CareerDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
use Models\JobOffer as JobOffer;
use Models\Student;
use Models\User as User;
use Models\Company as Company;
use DAO\CompanyDAO;
use DAO\UserDAO;
use DateTime;

class CompanyPanelController
{
    public function validateCompany()
    {
        require_once(VIEWS_PATH.'Company/validate-company.php');
}
    public function showHomeCompany()
    {
        $this->validateCompany();
        $userLogged = $_SESSION['loggedUser'];
        require_once(VIEWS_PATH."company/home-company.php");
    }

    public function registerUserCompany($nameCompany, $city, $address, $size, $email, $phoneNumber, $CUIT, $password)
    {

        $this->validateCompany();
        $companyDAO = CompanyDAO::getInstance();
        $userDAO = UserDAO::getInstance();
        $company = new Company(0, $nameCompany, $city, $address, $size, $email, $phoneNumber, $CUIT);
        $companyDAO->add($company);
        $companyToUser = $companyDAO->searchByCuit($CUIT);
        // var_dump($companyToUser);
        $student = new Student();
        $student->setStudentId(0);
        $user = new User(0, $student, $password, $email, 3, intval($companyToUser->getCompanyId()));
        $userDAO->add($user);

        // header("location:".FRONT_ROOT."home/index");
    }



    public function showAddJobOffer()
    {

        $this->validateCompany();
        $jobPositionDAO = JobPositionDAO::getInstance();
        $jobPositionList = $jobPositionDAO->getAll();
        $id = $_SESSION['loggedUser']->getCompany()->getCompanyId();
        require_once(VIEWS_PATH . "company/add-jobOffer.php");
    }

    public function addJobOffer($company, $jobPosition, $requirements, $date, $time)
    {
        $this->validateCompany();
        ini_set("date.timezone", "America/Argentina/Buenos_Aires");
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $fileName = $_FILES['flyer']['name'];
        $tempFileName = $_FILES['flyer']["tmp_name"];
        $filePath = UPLOADS_PATH . basename($fileName);
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        move_uploaded_file($tempFileName, $filePath);
        $dateJO = new DateTime($date . $time);
        $dateString = date_format($dateJO, ("M-d-Y  H:i"));
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobPositionDAO = JobPositionDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $companyDAO = CompanyDAO::getInstance();
        $jp = $jobPositionDAO->searchById($jobPosition);
        $cm = $companyDAO->searchById($company);
        $jobOffer = new JobOffer();
        $jobOffer->setRequirements($requirements);
        $jobOffer->setCompany($cm);
        $jobOffer->setJobPosition($jp);
        $jobOffer->setFlyer($filePath);
        $jobOffer->setDateExpiration($dateString);
        $jobOfferDAO->add($jobOffer);

        $this->showListJobOffer();
    }

    public function showListJobOffer()
    {
        $this->validateCompany();
        $appointmentDAO = AppointmentDAO::getInstance();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferList = $jobOfferDAO->getAllByCompany($_SESSION['loggedUser']->getCompany()->getCompanyId());
        $jobOfferList = ($jobOfferList) ? $jobOfferList : array();
        require_once(VIEWS_PATH . "Company/viewJobOffer.php");
    }

    public function deleteJobOffer($id)
    {
        $this->validateCompany();
        //   $this->validateAdmin();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferDAO->delete($id);

        $this->showListJobOffer();
    }

    public function modifyRequirements($id, $requirements)
    {
        $this->validateCompany();
        //  $this->validateAdmin();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferDAO->modifyRequirements($id, $requirements);
        $this->showListJobOffer();
    }
   

    public function modifyJobPosition($id, $jobPosition)
    {
        $this->validateCompany();
        //   $this->validateAdmin();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferDAO->modifyJobPosition($id, $jobPosition);
        $this->showListJobOffer();
    }
    public function modifyDateExpiracion($id, $date,$time)
    {
        $this->validateCompany();
        ini_set("date.timezone", "America/Argentina/Buenos_Aires");
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        //   $this->validateAdmin();
        $dateJO = new DateTime($date . $time);
        $dateString = date_format($dateJO, ("M-d-Y  H:i"));
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferDAO->modifyDateExpiration($id,$dateString);
        $this->showListJobOffer();
    }
    

    public function showModifyJobOffer($id)
    {

        $this->validateCompany();
        $jobPositionDAO = JobPositionDAO::getInstance();
        $jobPositionList = $jobPositionDAO->getAll();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOffer = $jobOfferDAO->searchById($id);
        require_once(VIEWS_PATH . "Company/modifyJobOffer.php");
    }

}
