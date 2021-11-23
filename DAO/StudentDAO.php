<?php

namespace DAO;

use Models\Student;
use DAO\CareerDAO as CareerDAO;
use Interfaces\IAPI;
use Models\Career as Career;

class StudentDAO
{
  private $studentList = array();
    protected  static $instance = null;
  public function __construct()
  {
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new StudentDAO();
    }

    return self::$instance;
  }
  private function retrieveDataFromAPI()
  {
//    $url = curl_init();
//    curl_setopt($url, CURLOPT_URL, API_HOST . "/Student");
//    curl_setopt($url, CURLOPT_HTTPHEADER, array(HTTP_PROTOCOL));
//    curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);
//    $response = curl_exec($url);
//    $toJson = json_decode($response);
//    return $toJson;
      $arrayToDecode=array();
      $jsonContent=file_get_contents("Data/student.json");
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();




      return $arrayToDecode;
  }
  public function retrieveData()
  {
    $careerDAO=new CareerDAO();
    $response = $this->retrieveDataFromAPI();

    foreach ($response as $std) {
      $student = new Student();
//      $student->setStudentId($std->studentId);
//      $student->setCareer($std->careerId);
//
//      $student->setFirstName($std->firstName);
//      $student->setLastName($std->lastName);
//      $student->setDni($std->dni);
//      $student->setFileNumber($std->fileNumber);
//      $student->setPhoneNumber($std->phoneNumber);
//      $student->setGender($std->gender);
//      $student->setEmail($std->email);
//      $student->setBirthDate($std->birthDate);
//      $student->setActive($std->active);
        $student->setStudentId($std['studentId']);
        $student->setCareer($careerDAO->searchById($std['careerId']));

        $student->setFirstName($std['firstName']);
        $student->setLastName($std['lastName']);
        $student->setDni($std['dni']);
        $student->setFileNumber($std['fileNumber']);
        $student->setPhoneNumber($std['phoneNumber']);
        $student->setGender($std['gender']);
        $student->setEmail($std['email']);
        $student->setBirthDate($std['birthDate']);
        $student->setActive($std['active']);
      array_push($this->studentList, $student);
    }
  }
  public function getAll()
  {
   $this->retrieveData();
     return $this->studentList;
  }
  public function searchByEmail($email)
  {
    $this->retrieveData();
    foreach ($this->studentList as $std) {
      if ($std->getEmail() == $email) {
        return $std;
      }
    }
    return null;
  }
    public function searchById($id)
    {
        $this->retrieveData();
        foreach ($this->studentList as $std) {
            if ($std->getStudentId() == $id) {
                return $std;
            }
        }
        return false;
    }
    public function searchByValidation() //Buscar usuarios activos
    {
        $arrayList = $this->getAll();
        foreach ($arrayList as $std) {
            if (!$std->getActive()) {
                $key=array_search($std,$arrayList);
                unset($arrayList[$key]);
            }
        }
        return $arrayList;
    }
}
