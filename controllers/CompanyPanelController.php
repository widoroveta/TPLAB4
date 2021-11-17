<?php

namespace Controllers;

use DAO\AppointmentDAO;
use Models\Student;
use Models\User as User;
use Models\Company as Company;
use DAO\CompanyDAO;
use DAO\UserDAO;


class CompanyPanelController
{
    public function showHomeCompany()
    {
        require_once(VIEWS_PATH . "company/home-company.php");
    }

    public function registerUserCompany($nameCompany, $city, $address, $size, $email, $phoneNumber, $CUIT, $password)
    {
        $companyDAO = CompanyDAO::getInstance();
        $userDAO = UserDAO::getInstance();
        $company = new Company(0, $nameCompany, $city, $address, $size, $email, $phoneNumber, $CUIT);
        $companyDAO->add($company);
        $companyToUser = $companyDAO->searchByCuit($CUIT);
        var_dump($companyToUser);
        $student = new Student();
        $student->setStudentId(0);
        $user = new User(0, $student, $password, $email, 3, intval($companyToUser->getCompanyId()));
        $userDAO->add($user);

        // header("location:".FRONT_ROOT."home/index");
    }

    public function generatePdf($id = "")
    {
        $array = array("messi", "tuvvieja", "bala", "gruyere");
        require_once(VIEWS_PATH . "Company/pfdDownload.php");
    }

    public function sendMail()
    {

        require_once(VIEWS_PATH . 'sendMail.php');

    }

    public function showJobOffers()
    {$appointmentDAO=AppointmentDAO::getInstance();

        // $appointmentDAO->getAllbyCompany($_SESSION['loggedUser']->getCompany()->getComp);
        require_once (VIEWS_PATH."Company/viewJobOffer.php");
    }
}
