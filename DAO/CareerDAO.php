<?php

namespace DAO;

use Interfaces\IAPI;
use Models\Career as Career;

class CareerDAO
{
protected static  $instance=null;
    private $careerList;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new CareerDAO();
        }

        return self::$instance;
    }
    public function retrieveDataFromAPI()
    {
        $url = curl_init();
        curl_setopt($url, CURLOPT_URL, API_HOST . "/Career");
        curl_setopt($url, CURLOPT_HTTPHEADER, array(HTTP_PROTOCOL));
        curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($url);
                $toJson = json_decode($response);
return $toJson;
//            $arrayToDecode=array();
//            $jsonContent=file_get_contents("Data/careers.json");
//            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
//
//
//
//        return $arrayToDecode;
    }
    public function retrieveData()
    {
        $this->careerList = array();
        $cs = $this->retrieveDataFromAPI();
        if ($cs != null) {
            foreach ($cs  as $c) {
                $career = new Career();
                $career->setCareerId($c->careerId);
                $career->setDescription($c->description);
                $career->setActive($c->active);
//                $career->setCareerId($c['careerId']);
//                $career->setDescription($c['description']);
//                $career->setActive($c['active']);
                array_push($this->careerList, $career);
            }
        }
    }
    public function getAll()
    {
        $this->retrieveData();
        return $this->careerList;
    }
    public function searchById($id)
    {
        $this->retrieveData();
        if ($this->careerList != null) {
            foreach ($this->careerList as $c) {

                if ($c->getCareerId() == $id) {

                    return $c;
                }
            }
        }
    }
    public function getCareerById($id)
    {
        if ($this->careerList != null) {
            foreach ($this->careerList as $c) {

                if ($c->getCareerId() == $id) {

                    return $c;
                }
            }
        }
    }
    public function getCareerByValidation()
    {
        if ($this->careerList != null) {
            foreach ($this->careerList as $c) {

                if ($c->getActive() == 1) {

                    return $c;
                }
            }
        }
    }
}
