<?php
namespace DAO;

use DAO\DAO as DAO;
use Interfaces\IAPI;
use Models\Career;
use Models\JobPosition as JobPosition;
use DAO\CareerDAO as CareerDAO;


class JobPositionDAO {
    protected static $instance = null;
    private $jobPositionList=array();
    public function __construct()
    {
        
    }
    public function retrieveData()
    {
            $careerDAO=CareerDAO::getInstance();
            $careerDAO->getAll();
        $response = $this->retrieveDataFromAPI();

        foreach ($response as $jbp) {
            $jobPosition=new JobPosition();
            $jobPosition->setJobPositionId($jbp->jobPositionId);
            $jobPosition->setCareer($careerDAO->getCareerById($jbp->careerId));
            $jobPosition->setDescription($jbp->description);
            array_push($this->jobPositionList,$jobPosition);
        }
    }
    public  function getAll()
    {
        $this->retrieveData();
        return $this->jobPositionList;
    }
    public  static function getInstance(){
        if (self::$instance == null) {
            self::$instance = new JobPositionDAO();
        }

        return self::$instance;
    }
    private function retrieveDataFromAPI()
    {
        $url = curl_init();
        curl_setopt($url, CURLOPT_URL, API_HOST . "/JobPosition");
        curl_setopt($url, CURLOPT_HTTPHEADER, array(HTTP_PROTOCOL));
        curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($url);

        $toJson = json_decode($response);

        return $toJson;

    }
    public function searchById($id)
    {
        $this->retrieveData();
        foreach ($this->jobPositionList as $jobPosition) {
            if ($jobPosition->getJobPositionId() == $id) {
                return $jobPosition;
            }
        }
    }
}

