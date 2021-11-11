<?php

namespace DAO;

use DAO\Connection as Connection;
use \PDOException as PDOException;

class AppointmentOldDAO
{
    private $conecction;
    protected static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new AppointmentOldDAO();
        }

        return self::$instance;
    }

    public function add($appointmentOld)
    {
        $sqlQuery = 'INSERT INTO `appointmentold` (`id`, `nameCompany`, `student`, `jobPosition`, `career`, `date`) VALUES (:id,:nameCompany,:student,:jobPosition,:career,:date);';
        $parameters['id'] = $appointmentOld->getId();
        $parameters['nameCompany'] = $appointmentOld->getNameCompany();
        $parameters['student'] = $appointmentOld->getStudent();
        $parameters['jobPosition'] = $appointmentOld->getJobPosition();
        $parameters['career'] = $appointmentOld->getCareer();
        $parameters['date'] = $appointmentOld->getDate();
        try {
            $this->conecction = Connection::GetInstance();
            $response = $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
            if ($response != null) {
                return $response;

            } else {
                return null;
            }
        } catch (PDOException $ex) {
            throw $ex;


        }
    }

}