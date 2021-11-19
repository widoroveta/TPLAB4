<?php

namespace DAO;

use Models\Company;
use Models\JobPosition;
use Models\User as User;
use PDOException as PDOException;
use DAO\Connection as Connection;
use Models\JobOffer as JobOffer;


class JobOfferDAO
{
    private $conecction;
    protected static $instance = null;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new JobOfferDAO();
        }

        return self::$instance;
    }

    public function add($jobOffer)
    {
        $sqlQuery = "INSERT INTO jobOffer (companyId,jobPositionId,requirements,flyer,dateExpiration) VALUES (:companyId,:jobPositionId,:requirements,:flyer,:dateExpiration )";
        $parameters['companyId'] = $jobOffer->getCompany()->getCompanyId();
        $parameters['jobPositionId'] = $jobOffer->getJobPosition()->getJobPositionId();
        $parameters['requirements'] = $jobOffer->getRequirements();
        $parameters['flyer'] = $jobOffer->getFlyer();
        $parameters['dateExpiration'] = $jobOffer->getDateExpiration();
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return null;
    }

    public function getAllByJobPositions($jobPositionList)
    {
        $jobOfferList = $this->getAll();
        $array = array();
        if ($jobOfferList != null) {
            if ($jobOfferList != null) {
                foreach ($jobPositionList as $jp) {
                    foreach ($jobOfferList as $jo) {
                        if ($jo->getJobPosition() == $jp) {
                            array_push($array, $jo);
                        }
                    }
                }
            }
            return $array;
        }
    }

    public function getAll()
    {
        $sqlQuery = "SELECT * FROM joboffer j left join company c on j.companyId =c.companyId ;";
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


    public function delete($id)
    {
        $sqlquery = "DELETE FROM jobOffer WHERE (id = :id)";
        try {

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyRequirements($id, $requirements)
    {
        $sqlquery = "UPDATE jobOffer   SET requirements = :requirements WHERE (id = :id)";
        $parameters["requirements"] = $requirements;
        $parameters["id"] = $id;
        try {


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyCompany($id, $companyId)
    {
        $sqlquery = "UPDATE jobOffer  SET companyId = :companyId WHERE (id = :id)";
        $parameters["companyId"] = $companyId;
        $parameters["id"] = $id;
        try {


            $this->connection = Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function modifyJobPosition($id, $jobPositionId)
    {
        $sqlquery = "UPDATE jobOffer  SET jobPositionId = :jobPositionId WHERE (id = :id)";
        $parameters["jobPositionId"] = $jobPositionId;
        $parameters["id"] = $id;
        try {
            $this->connection = Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($sqlquery, $parameters);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function searchById($id)
    {
        $sqlQuery = 'select * from joboffer j left join company c on j.companyId =c.companyId  where (id= :id)';
        $parameters['id'] = $id;
        try {
            $this->conecction = Connection::GetInstance();
            $resultSet = $this->conecction->Execute($sqlQuery, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
        if (!empty($resultSet)) {
            $jobOffer = $this->mapout($resultSet);
        } else {
            $jobOffer = false;
        }
        return $jobOffer;

    }

    public function mapout($value)
    {

        $jobPositionDAO = JobPositionDAO::getInstance();

        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {

            $jobPositionDAO = JobPositionDAO::getInstance();
            return new JobOffer($p['id'], $jobPositionDAO->searchById($p['jobPositionId']), new Company($p['companyId'], $p['nameCompany'], $p['city'], $p['address'], $p['size'], $p['email'], $p['phoneNumber'], $p['cuit']), $p['requirements'],$p['flyer'],$p['dateExpiration']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }
}