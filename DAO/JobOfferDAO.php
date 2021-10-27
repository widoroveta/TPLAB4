<?php

namespace DAO;


use Models\JobOffer as JobOffer;


class JobOfferDAO
{
    protected static $instance = null;
    private $jobOfferList;

    public function __construct()
    {
        $this->fileName = DATA_PATH . "jobOffer.json";
        $this->jobOfferList = array();
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
        $c = 0;
        //  $this->retrieveData();

        if ($jobOffer instanceof JobOffer && $jobOffer != null) {
            if (!empty($this->JobOfferList)) {

                $c = $this->higherId();

                $jobOffer->setJobOfferId(++$c);
            } else {

                $jobOffer->setJobOfferId(0);
            }

            array_push($this->jobOfferList, $jobOffer);
        }

        $this->saveData();
    }

    private function higherId()
    {
        $idMax = 0;
        foreach ($this->JobOfferList as $c) {
            if ($c->getJobOfferId() > $idMax)
                $idMax = $c->getJobOfferId();
        }
        return $idMax;
    }

    private function retrieveData()
    {
        $this->JobOfferList = array();
        $jsonPath = $this->fileName;
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            var_dump($arrayToDecode);
            if (is_array($arrayToDecode)) {
                foreach ($arrayToDecode as $arrayValue) {
                    $jobOffer = new JobOffer();
                    $jobOffer->setJobOfferId($arrayValue['jobOfferId']);
                    $jobOffer->setJobPosition($arrayValue['jobPosition']);
                    $jobOffer->setCompany($arrayValue['company']);

                    array_push($this->JobOfferList, $JobOffer);
                }
            } else {
                array_push($this->JobOfferList, $JobOffer);
            }

        }
    }

    public function saveData()
    {
        $arrayToEncode = array();
        $jsonPath = $this->fileName;
        var_dump($this->jobOfferList);
        foreach ($this->jobOfferList as $jobOffer) {
            $arrayValue['jobOfferId'] = $jobOffer->getJobOfferId();
            $arrayValue['jobPostion'] = $jobOffer->getJobPosition();
            $arrayValue['company'] = $jobOffer->getCompany();

            array_push($arrayToEncode, $arrayValue);
        }
        var_dump($arrayToEncode);
        $jsonContent = json_encode($arrayToEncode);
        var_dump($jsonContent);
        file_put_contents($jsonPath, $jsonContent);
    }
}