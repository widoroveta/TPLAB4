<?php
namespace Models;
use Models\Career as Career;
class Student{
    private $studentId;
    private $career;
    private $firstName;
    private $lastName;
    private $dni;
    private $fileNumber;
    private $gender;
    private $birthDate;
    protected $email;
    private $phoneNumber;
    private $active;

   
    public function getStudentId()
    {
        return $this->studentId;
    }

    
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

   
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }
 
    public function getLastName()
    {
        return $this->lastName;
    }

    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
 
    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    
    public function getFileNumber()
    {
        return $this->fileNumber;
    }
 
    public function setFileNumber($fileNumber)
    {
        $this->fileNumber = $fileNumber;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

  
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

   
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

   
    public function getActive()
    {
        return $this->active;
    }

   
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

  
    public function getCareer()
    {
        return $this->career;
    }

  
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }
}

?>