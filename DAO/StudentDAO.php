<?php

namespace DAO;

use Models\Student;

class StudentDAO
{
  private $studentList=array();

  public function retrieveDataFromAPI()
  {
    $url = curl_init();
    curl_setopt($url, CURLOPT_URL, API_HOST."/Student");
    curl_setopt($url, CURLOPT_HTTPHEADER, array(HTTP_PROTOCOL));
    curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($url);
    $toJson = json_decode($response);
    return $toJson;
  }
  public function retrieveData(){
    $response=$this->retrieveDataFromAPI();
   
    foreach($response as $std)
    {
      $student = new Student();
      $student->setStudentId($std->studentId);
      $student->setCareer($std->careerId);
      $student->setFirstName($std->firstName);
      $student->setLastName($std->lastName);
      $student->setDni($std->dni);
      $student->setFileNumber($std->fileNumber);
      $student->setPhoneNumber($std->phoneNumber);
      $student->setGender($std->gender);
      $student->setEmail($std->email);
      $student->setBirthDate($std->birthDate);
      $student->setActive($std->active);
      array_push($this->studentList,$student);
    }
     
  }
  public function getAll(){
    $this->retrieveData();
   // return $this->retrieveData();
  }
  public function searchByEmail($email){
    $this->retrieveData();
    foreach($this->studentList as $std)
    {
      if($std->getEmail()==$email)
      {
        return $std;
      }

    }
    return false;
  }
}
