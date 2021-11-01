<?php

namespace DAO;

use DAO\Connection as Connection;
use Models\Appointment as Appointment;
class AppointmentDAO
{
    private $conecction;
    protected static $instance = null;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new AppointmentDAO();
        }

        return self::$instance;
    }

    public static function add($appointment)
    {
        $sqlQuery = "INSERT INTO appointment (studentId,jobOfferId,cv,message) VALUES (:studentId,:jobOfferId,:cv,:message)";
        $parameters['studentId'] = $appointment->getStudentId();
        $parameters['jobOfferId'] = $appointment->getJobOfferId();
        $parameters['cv'] = $appointment->getCv();
        $parameters['message'] = $appointment->getMessage();
        try {
         $this->conecction=Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return null;
    }

}