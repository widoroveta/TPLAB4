<?php

namespace DAO;

use DAO\Connection as Connection;
use Models\Appointment as Appointment;
use Models\Company;
use Models\JobOffer;
use \PDOException as PDOException;

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

    public function add($appointment)
    {
        $id = $appointment->getStudent();
       if(!$this->validationOneAppointment($id)){
        ini_set("date.timezone", "America/Argentina/Buenos_Aires");
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $date = date("d-m-Y-(g:i)");
        $sqlQuery = "INSERT INTO appointment (studentId,jobOfferId,cv,message,dateAppointment) VALUES (:studentId,:jobOfferId,:cv,:message,:dateAppointment)  ";
        $parameters['studentId'] = $appointment->getStudent();
        $parameters['jobOfferId'] = $appointment->getJobOffer();
        $parameters['cv'] = $appointment->getCv();
        $parameters['message'] = $appointment->getMessage();
        $parameters['dateAppointment'] = $date;

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
       }else{
           return null;
       }
    }
        public  function  maxId()
        {
            $sqlQuery="SELECT * FROM appointment a left join jobOffer j on a.jobOfferId=j.id left join company c on c.companyId= j.companyId where a.apid=(select max(apid) from appointment)";
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
        public function validationOneAppointment($id)
        {
            $sqlQuery='SELECT apid FROM appointment where (studentId = :id)';
            $parameters['id']=$id;
            try {
                $this->connection = Connection::getInstance();

               return $this->connection->execute($sqlQuery,$parameters);
            }
            catch (PDOException $ex)
            {
                throw $ex;
            }
        }
        public  function searchById($id)
        {
            $sqlQuery='SELECT * FROM  appointment a left join jobOffer j on a.jobOfferId=j.id left join company c on c.companyId= j.companyId where (a.apid= :id)';
            $parameters['id']=$id;
            try {
                $this->conecction = Connection::GetInstance();
                $resultSet= $this->conecction->Execute($sqlQuery, $parameters);

            } catch (PDOException $ex) {
                throw $ex;
            }
            if(!empty($resultSet))
            {
                $appointment = $this->mapout($resultSet);
            }
            else
            {
                $appointment = false;
            }

            return $appointment;
        }
        public
        function getAll()
        {
            $sqlQuery = "SELECT * FROM appointment a left join jobOffer j on a.jobOfferId=j.id left join company c on c.companyId= j.companyId";
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

        public
        function getAppointmentsBy($id)
        {
            $sqlQuery = "SELECT * FROM appointment a left join jobOffer j on a.jobOfferId=j.id left join company c on c.companyId= j.companyId where (a.studentId= :studentId)";
            $parameters['studentId'] = $id;
            try {
                $this->connection = Connection::getInstance();

                $result = $this->connection->execute($sqlQuery, $parameters);
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
    public function delete($id)
    {
        $sqlquery = "DELETE FROM appointment WHERE (apid = :id)";
        $parameters["id"] = $id;
        try {



            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

        public
        function validationByStudent($id)
        {
            $sqlQuery = "select apid from appointment where (studentId = :studentId);";
            $parameters['studentId'] = $id;
            try {
                $conecction = Connection::getInstance();
                return $conecction->execute($sqlQuery, $parameters);
            } catch (\PDOException $exception) {
                throw  $exception;
            }
        }


        public
        function mapout($value)
        {


            $value = is_array($value) ? $value : [];

            $resp = array_map(function ($p) {
                $studentDAO = StudentDAO::getInstance();
                $jobPositionDAO = JobPositionDAO::getInstance();
                return new Appointment($p['apId'],$studentDAO->searchById($p['studentId']), new JobOffer($p['jobOfferId'], $jobPositionDAO->searchById($p['jobPositionId']), new Company($p['companyId'], $p['nameCompany'], $p['city'], $p['address'], $p['size'], $p['email'], $p['phoneNumber'], $p['cuit']), $p['requirements']), $p['cv'], $p['message'], $p['dateAppointment']);
            }, $value);

            return count($resp) > 1 ? $resp : $resp['0'];
        }

    }