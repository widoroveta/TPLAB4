<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\JobOfferDAO;

class PDFController
{
        public  function  dowloadPDF($id,$controller){
          $jobOfferDAO=JobOfferDAO::getInstance();
          $jobOffer=$jobOfferDAO->searchById($id);
            $appointmentDAO=AppointmentDAO::getInstance();
            $appointmentList=$appointmentDAO->getAllbyJobOffer($id);
            if(!empty($appointmentList)) {
                require_once(VIEWS_PATH . "Actions/pfdDownload.php");
            }
            else{
                $message='no hay postulaciones';
                header("location:".FRONT_ROOT."$controller/showListJobOffer?varMessage=$message");
            }
        }


}