<?php

namespace DAO;

use Models\Student;

class StudentDAO
{
  private $studentList=array();

  public function retrieveDataFromAPI()
  {
    $url = curl_init();
    curl_setopt($url, CURLOPT_URL, 'https://utn-students-api.herokuapp.com/api/Student');
    curl_setopt($url, CURLOPT_HTTPHEADER, array('x-api-key:4f3bceed-50ba-4461-a910-518598664c08'));
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
}
