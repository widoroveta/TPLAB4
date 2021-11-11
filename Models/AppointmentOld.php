<?php

namespace Models;

class AppointmentOld
{
    private $id;
 private $nameCompany;
 private $student;
 private $jobPosition;
 private $career;
 private $date;

    /**
     * @param $id
     * @param $nameCompany
     * @param $student
     * @param $jobPosition
     * @param $career
     * @param $date
     */
    public function __construct($id='', $nameCompany='', $student='', $jobPosition='', $career='', $date='')
    {
        $this->id = $id;
        $this->nameCompany = $nameCompany;
        $this->student = $student;
        $this->jobPosition = $jobPosition;
        $this->career = $career;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNameCompany()
    {
        return $this->nameCompany;
    }

    /**
     * @param mixed $nameCompany
     */
    public function setNameCompany($nameCompany)
    {
        $this->nameCompany = $nameCompany;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

    /**
     * @return mixed
     */
    public function getJobPosition()
    {
        return $this->jobPosition;
    }

    /**
     * @param mixed $jobPosition
     */
    public function setJobPosition($jobPosition)
    {
        $this->jobPosition = $jobPosition;
    }

    /**
     * @return mixed
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * @param mixed $carrera
     */
    public function setCareer($career)
    {
        $this->carrera = $carrera;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

}