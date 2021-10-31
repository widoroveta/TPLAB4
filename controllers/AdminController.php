<?php

namespace Controllers;

use Models\JobOffer as JobOffer;
use DAO\CareerDAO;
use DAO\CompanyDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;
use DAO\StudentDAO;
use Models\JobPosition;

class AdminController
{

    public function showListCompany()
    {
  //  $this->validateAdmin();
        $companyDAO = CompanyDAO::getInstance();
        $companyList = $companyDAO->getAll();

        require_once(VIEWS_PATH . "Admin/list-company.php");
    }

    public function showListStudent()
    {
        $this->validateAdmin();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();
        $careerDAO->getAll();
        $studentList = $studentDAO->getAll();
        require_once(VIEWS_PATH . "Admin/list-student.php");
    }

    public function showAddCompany()
    {
      //  $this->validateAdmin();
        require_once(VIEWS_PATH . "Admin/add-company.php");
    }

    public function showPanelModifyCompany($id)
    {
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

    public function modifyName($id, $name)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyName($id, $name);
        $this->showListCompany();
    }

    public function modifyCity($id, $city)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyCity($id, $city);
        $this->showListCompany();

    }

    public function modifySize($id, $size)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifySize($id, $size);
        $this->showListCompany();

    }

    public function modifyEmail($id, $email)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyEmail($id, $email);
        $this->showListCompany();

    }

    public function modifyPhoneNumber($id, $phoneNumber)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyPhoneNumber($id, $phoneNumber);
        $this->showListCompany();

    }

    public function modifyCuit($id, $cuit)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->modifyCuit($id, $cuit);
        $this->showListCompany();

    }

    public function modifyAddress($id, $address)
    {
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
        $jobPositionDAO = JobPositionDAO::getInstance();
        $jobPositionList = $jobPositionDAO->getAll();
        $companyDAO = CompanyDAO::getInstance();
        $companyList = $companyDAO->getAll();
        require_once(VIEWS_PATH . "admin/add-jobOffer.php");
    }
    public  function addJobOffer($company,$jobPosition,$requirements){
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

}
