<?php

namespace DAO;

use DAO\Connection as Connection;
use Models\Appointment as Appointment;
use Models\AppointmentOld;
use Models\Company;
use Models\JobOffer;
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
    public  function  getAll(){
       $sqlQuery='select * from appointmentOld ao left join appointment a on ao.id != a.apid ';
        try {
            $this->connection = Connection::getInstance();

            $result = $this->connection->execute($sqlQuery);
        } catch (PDOException $ex) {
            throw $ex;
        }

        if (!empty($result)) {
            $result = $this->mapout($result);

            $jobOfferList = array();

            if (!is_array($result)) {
                array_push($jobOfferList, $result);
            }
        } else {
            $result = false;
        }

        if (!empty($jobOfferList)) {
            $finalResult = $jobOfferList;
        } else {
            $finalResult = $result;
        }

        return $finalResult;

    }
    public  function  getAllByStudent($email){
        $sqlQuery='select * from appointmentOld ao left join appointment a  on ao.id != a.apid where ( ao.student = :email) ';
        $parameters['email']=$email;
        try {
            $this->connection = Connection::getInstance();

            $result = $this->connection->execute($sqlQuery,$parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }

        if (!empty($result)) {
            $result = $this->mapout($result);

            $jobOfferList = array();

            if (!is_array($result)) {
                array_push($jobOfferList, $result);
            }
        } else {
            $result = false;
        }

        if (!empty($jobOfferList)) {
            $finalResult = $jobOfferList;
        } else {
            $finalResult = $result;
        }

        return $finalResult;

    }
    public
    function mapout($value)
    {


        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {

            return new AppointmentOld($p['id'],$p['nameCompany'],$p['jobPosition'],$p['career'],$p['date']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }
}