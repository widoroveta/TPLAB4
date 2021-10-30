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
        $sqlQuery = "INSERT INTO jobOffer (companyId,jobPositionId,requirements) VALUES (:companyId,:jobPositionId,:requirements)";
        $parameters['companyId'] = $jobOffer->getCompany()->getCompanyId();
        $parameters['jobPositionId'] = $jobOffer->getJobPosition()->getJobPositionId();
        $parameters['requirements'] = $jobOffer->getRequirements();
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters, 0);
        } catch (PDOException $ex) {
            throw $ex;
        }
        return null;
    }

    public function getAll()
    {
        $sqlQuery = "SELECT * FROM joboffer";
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

    public function mapout($value)
    {
        $companyDAO = CompanyDAO::getInstance();
        $companyDAO->getAll();
        $jobPositionDAO = JobPositionDAO::getInstance();
//    $jobPositionDAO->getAll();

        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($p) {
            $companyDAO = CompanyDAO::getInstance();
            $jobPositionDAO = JobPositionDAO::getInstance();
            return new JobOffer($p['id'], $jobPositionDAO->searchById($p['jobPositionId']), $companyDAO->searchById($p['companyId']), $p['requirements']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }
}