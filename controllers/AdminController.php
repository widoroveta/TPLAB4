<?php

namespace Controllers;

use Cassandra\FutureRows;
use DAO\AppointmentDAO;
use DAO\AppointmentOldDAO;
use DAO\UserDAO;
use Models\Company as Company;
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
        $companyList = $companyList != null ? $companyList : array();
        require_once(VIEWS_PATH . "Admin/list-company.php");
    }
    public  function showListJobOffer()
    {
        $this->validateAdmin();
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferList = $jobOfferDAO->getAll();
        $jobOfferList = $jobOfferList != null ? $jobOfferList : array();
        require_once(VIEWS_PATH . "admin/list-jobOffer.php");
    }
    public function showListStudent($check = '', $email='')
    {
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $studentList = array();

        if($email==''){
            if ($check!='on' ) {
            $studentList = $studentDAO->getAll();
        } else {
            $studentList = $studentDAO->searchByValidation();
        }
    }else{
        $email=$studentDAO->searchByEmail($email);
        if(!empty($email)){
        $studentList=array();
            array_push($studentList,$email);//TODO
            }
        }
        
    
        $studentList = $studentList != null ? $studentList : array();
        require_once(VIEWS_PATH . "Admin/list-student.php");
    }
    public function showValidateStudent()
    {
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $userDAO = UserDAO::getInstance();
        $studentList = $studentDAO->searchByValidation();

        require_once(VIEWS_PATH . "Admin/register-user.php");
    }

    public function addNewUser($idModal, $pass2)
    {
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
    public function addCompany($nameCompany,$city,$address,$size,$email,$phoneNumber,$CUIT){
        $companyDAO=CompanyDAO::getInstance();
        header("location".FRONT_ROOT."Admin/validateAdmin");
        $company =new Company();
        $company->setNameCompany($nameCompany);
        $company->setCity($city);
        $company->setAddress($address);
        $company->setSize($size);
        $company->setEmail($email);
        $company->setPhoneNumber($phoneNumber);
        $company->setCuit($CUIT);
        $var=$companyDAO->add($company);
        $this->showAddCompany();
    }
    public function showAddCompany($message='')
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

        $this->validateAdmin();;
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->delete($id);
        $this->showListCompany();
    }
    public function deleteJobOffer($id)
    {
        $this->validateAdmin();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferDAO->delete($id);
        $this->showListJobOffer();
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
    public  function addJobOffer($company, $jobPosition, $requirements)
    {
        $this->validateAdmin();
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
        $jobOfferDAO->add($jobOffer);

        $this->showAddJobOffer();
    }
    public function showListAppoinment()
    {
        $this->validateAdmin();
        $appointment = AppointmentDAO::getInstance();
        $fileList = $appointment->getAll();
        $fileList = $fileList != null ? $fileList : array();

        require_once(VIEWS_PATH . "admin/list-Appointment.php");
    }
    public function showModifyJobOffer($id)
    {
        $this->validateAdmin();
        $companyDAO=CompanyDAO::getInstance();
        $companyList=$companyDAO->getAll();
        $jobPositionDAO=JobPositionDAO::getInstance();
        $jobPositionList=$jobPositionDAO->getAll();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOffer=$jobOfferDAO->searchById($id);
        require_once (VIEWS_PATH."admin/modifyViewJobOffer.php");
    }
    public function modifyCompany($id,$company){
        $this->validateAdmin();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferDAO->modifyCompany($id,$company);
        $this->showListJobOffer();
    }
    public function modifyRequirements($id,$requirements){
        $this->validateAdmin();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferDAO->modifyRequirements($id,$requirements);
        $this->showListJobOffer();
    }
    public function modifyJobPosition($id,$jobPosition){
        $this->validateAdmin();
        $jobOfferDAO=JobOfferDAO::getInstance();
        $jobOfferDAO->modifyJobPosition($id,$jobPosition);
        $this->showListJobOffer();
    }
    public function showTotalHistorial()
    {
        $this->validateAdmin();
        $appointmentOldDAO=AppointmentOldDAO::getInstance();
        $aol=$appointmentOldDAO->getAll();
        $aol=$aol!=null?$aol:array();
        require_once (VIEWS_PATH."Admin/total-history.php");
    }
    public function deleteAppointment($id)
    {

        $this->validateAdmin()();;
        $appointmentDAO = AppointmentDAO::getInstance();
        $appointmentDAO->delete($id);
        $this->showListAppoinment();
    }
}
