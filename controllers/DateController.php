<?php

namespace Controllers;
Use DateTime;
class DateController
{
    public function  getDate($date){

       // $validate=$this->dateValidate($date);
      //  require_once (VIEWS_PATH."Actions/jobOfferTest.php");
        }

public function  dateValidate($dateString){
    ini_set("date.timezone", "America/Argentina/Buenos_Aires");
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $date = new DateTime($dateString);

    $d2 = new DateTime('now');
    $difMt = intVal($date->diff($d2)->format("%r%m"));
    $difD = intVal($date->diff($d2)->format("%r%d"));
    $difH = intVal($date->diff($d2)->format("%r%h"));
    $difM = intVal($date->diff($d2)->format("%r%i"));


    if ($difMt < 0) {

        if ($difD < 0) {
            if ($difH < 0) {
                if ($difM < 0) {
                    return true;
                }else
                    return false;
            }else
                return false;
        }else
            return false;
    }
    else
        return false;

}
}