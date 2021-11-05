<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\UserDAO;
use Models\JobOffer as JobOffer;
use DAO\CareerDAO;
use DAO\CompanyDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
use DAO\StudentDAO;
use Models\JobPosition;
use Models\User;

class AdminController
{

    public function showListCompany()
    {
   $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyList = $companyDAO->getAll();
        $companyList=$companyList!=null ? $companyList : array();
        require_once(VIEWS_PATH . "Admin/list-company.php");
    }
public  function showListJobOffer(){
        $this->validateAdmin();
    $jobOfferDAO=JobOfferDAO::getInstance();
    $jobOfferList=$jobOfferDAO->getAll();
    $jobOfferList=$jobOfferList!=null ? $jobOfferList : array();
    require_once(VIEWS_PATH . "admin/list-jobOffer.php");
}
    public function showListStudent()
    {
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $studentList = $studentDAO->getAll();
        $studentList=$studentList!=null ? $studentList : array();
        require_once(VIEWS_PATH . "Admin/list-student.php");
    }
    public function showValidateStudent()
    {
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $userDAO=UserDAO::getInstance();
        $studentList = $studentDAO->searchByValidation();
        foreach ($studentList as $std)
        {
            if($userDAO->searchByStudentId($std->getStudentId()))
            {
                $key=array_search($std,$studentList);
                unset($studentList[$key]);
            }

        }
        require_once(VIEWS_PATH . "Admin/register-user.php");
    }

    public function addNewUser($idModal, $pass2){
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $student = $studentDAO->searchById($idModal);
        $user = new User();
        $user->setStudent($student);
        $user->setPassword($pass2);
        $userDAO = UserDAO::getInstance();
        $userDAO->add($user);
        $this->showValidateStudent();
    }

    public function showAddCompany()
    {
       $this->validateAdmin();
        require_once(VIEWS_PATH . "Admin/add-company.php");
    }

    public function showPanelModifyCompany($id)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $company = $companyDAO->searchById($id);
        require_once(VIEWS_PATH . "Admin/modifyViewCompany.php");
    }

    public function deleteCompany($id)
    {
        $this->validateAdmin();
        $this->validateAdmin();;
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->delete($id);
        $this->showListCompany();
    }

    public function modifyName($id, $name)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyName($id, $name);
        $this->showListCompany();
    }

    public function modifyCity($id, $city)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyCity($id, $city);
        $this->showListCompany();

    }

    public function modifySize($id, $size)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifySize($id, $size);
        $this->showListCompany();

    }

    public function modifyEmail($id, $email)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyEmail($id, $email);
        $this->showListCompany();

    }

    public function modifyPhoneNumber($id, $phoneNumber)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyPhoneNumber($id, $phoneNumber);
        $this->showListCompany();

    }

    public function modifyCuit($id, $cuit)
    {
        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyCuit($id, $cuit);
        $this->showListCompany();

    }

    public function modifyAddress($id, $address)
    {

        $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyAddress($id, $address);
        $this->showListCompany();

    }

    private function validateAdmin()
    {

        require_once(VIEWS_PATH . "Admin/Validate-admin.php");
    }

    public function showAddJobOffer()
    {
        $this->validateAdmin();
        $this->validateAdmin();
        $jobPositionDAO = JobPositionDAO::getInstance();
        $jobPositionList = $jobPositionDAO->getAll();
        $companyDAO = CompanyDAO::getInstance();
        $companyList = $companyDAO->getAll();
        require_once(VIEWS_PATH . "admin/add-jobOffer.php");
    }
    public  function addJobOffer($company,$jobPosition,$requirements){
        $this->validateAdmin();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobPositionDAO=JobPositionDAO::getInstance();
        $careerDAO=CareerDAO::getInstance();
        $companyDAO=CompanyDAO::getInstance();
        $jp=$jobPositionDAO->searchById($jobPosition);
        $cm=$companyDAO->searchById($company);
        $jobOffer=new JobOffer();
        $jobOffer->setRequirements($requirements);
        $jobOffer->setCompany($cm);
        $jobOffer->setJobPosition($jp);
        $jobOfferDAO->add($jobOffer);

       $this->showAddJobOffer();
    }
    public function showListAppoinment(){
        $this->validateAdmin();
        $appointment=AppointmentDAO::getInstance();
        $fileList=$appointment-> getAll();
        $fileList=$fileList!=null ? $fileList : array();

        require_once (VIEWS_PATH."admin/list-Appointment.php");
    }
    public function showModifyJobOffer(){

    }
}
