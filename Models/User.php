<?php

namespace Models;

class User
{
    private $userId;
    private $student;
    private $password;
    private $email;
    private $role;
    private $company;


    public function __construct($userId='', $student='', $password='', $email='', $role='', $company='')
    {
        $this->userId = $userId;
        $this->student = $student;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->company = $company;
    }

    
    public function getRole()
    {
        return $this->role;
    }

    
    public function setRole($role)
    {
        $this->role = $role;
    }

    
    public function getCompany()
    {
        return $this->company;
    }

   
    public function setCompany($company)
    {
        $this->company= $company;
    }

    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getStudent()
    {
        return $this->student;
    }

    public function setStudent($student)
    {
        $this->student = $student;
    }

   
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


}