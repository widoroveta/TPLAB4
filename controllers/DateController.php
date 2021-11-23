<?php

namespace Controllers;

use DAO\AppointmentDAO;
use DAO\JobOfferDAO;
use DateTime;

class DateController
{
    public function verificationDates()
    {
        $jobOfferDAO = JobOfferDAO::getInstance();
        $jobOfferList = $jobOfferDAO->getAll();
        $arrayDates = array();
        foreach ($jobOfferList as $jobOffer) {
            array_push($arrayDates, $this->dateValidate($jobOffer->getDateExpiration(), $jobOffer->getJobOfferId()));
        }

return $arrayDates;
    }

    public function getDate()
    {
        $arrayToDelete = array();
        $array = $this->verificationDates();
        foreach ($array as $date) {
            if ($date['year'] < 0) {
                array_push($arrayToDelete,$date);

            } elseif ($date['year'] == 0) {
                if ($date['month'] < 0)
                {   array_push($arrayToDelete,$date);}
                elseif ($date['month']==0){
                    if($date['day']<0)
                    {
                        array_push($arrayToDelete,$date);
                    }
                    elseif ($date['day']==0){
                        if($date['hour']<=0){
                            array_push($arrayToDelete,$date);;
                        }
                    }

                }
            }
        }
        return $arrayToDelete;
 }

    public function getDiffYear($date, $now)
    {
        $year = $date->format("Y");
        $yearnow = $now->format("Y");
        $diff = $year - $yearnow;
        return $diff;
    }

    public function getDiffMonth($date, $now)
    {
        $month = $date->format("m");
        $monthnow = $now->format("m");
        $diff = $month - $monthnow;
        return $diff;
    }

    public function getDiffDay($date, $now)
    {
        $day = $date->format("d");
        $daynow = $now->format("d");
        $diff = $day - $daynow;
        return $diff;
    }

    public function getDiffHour($date, $now)
    {
        $hour = $date->format("H");
        $hournow = $now->format("m");
        $diff = $hour - $hournow;
        return $diff;
    }

    public function getDiffMinute($date, $now)
    {
        $minute = $date->format("i");
        $minutenow = $now->format("i");
        $diff = $minute - $minutenow;
        return $diff;
    }

    public function dateValidate($dateString, $jobOfferId)
    {
        ini_set("date.timezone", "America/Argentina/Buenos_Aires");
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $date = DateTime::createFromFormat("M-d-Y  H:i", $dateString);

        $now = new DateTime('now');
        $array['jobOfferId'] = $jobOfferId;
        $array['year'] = $this->getDiffYear($date, $now);
        $array['month'] = $this->getDiffMonth($date, $now);
        $array['day'] = $this->getDiffDay($date, $now);
        $array['hour'] = $this->getDiffHour($date, $now);
        $array['minute'] = $this->getDiffMinute($date, $now);

        return $array;
    }
    public  function  sendEmail()
    {
        $jobOfferDAO=JobOfferDAO::getInstance();
        $appointmentDAO=AppointmentDAO::getInstance();
        $arrayJobOffers=array();
        $array = $this->getDate();
        foreach ($array as $value)
        {
            array_push(   $arrayJobOffers ,$appointmentDAO->getAllbyJobOffer($value['jobOfferId']));

        }
        $message='';
        require_once (VIEWS_PATH.'sendMail.php');
        foreach ($array as $value)
        {
            $jobOfferDAO->delete($value['jobOfferId']);
        }
       header("location:".FRONT_ROOT."home/index");

    }

}