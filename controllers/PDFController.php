<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\JobOfferDAO;

class PDFController
{
        public  function  dowloadPDF($id){
          $jobOfferDAO=JobOfferDAO::getInstance();
          $jobOffer=$jobOfferDAO->searchById($id);
            $appointmentDAO=AppointmentDAO::getInstance();
            $appointmentList=$appointmentDAO->getAllbyJobOffer($id);
            require_once(VIEWS_PATH."Actions/pfdDownload.php");

        }


}