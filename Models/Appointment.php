<?php

namespace Models;

class Appointment
{
    private $appointmentId;
    private $student;
    private $jobOffer;
    private $cv;
    private $message;
    private $date;

    /**
     * @param $appointmentId
     * @param $student
     * @param $jobOffer
     * @param $cv
     * @param $message
     * @param $date
     */
    public function __construct($appointmentId='', $student='', $jobOffer='', $cv='', $message='', $date='')
    {
        $this->appointmentId = $appointmentId;
        $this->student = $student;
        $this->jobOffer = $jobOffer;
        $this->cv = $cv;
        $this->message = $message;
        $this->date = $date;
    }


    /**
     * @return mixed|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed|string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    public function getAppointmentId()
    {
        return $this->appointmentId;
    }


    public function setAppointmentId($appointmentId)
    {
        $this->appointmentId = $appointmentId;
    }

    /**
     * @return mixed
     */
    public function getJobOffer()
    {
        return $this->jobOffer;
    }

    /**
     * @param mixed $jobOffer
     */
    public function setJobOffer($jobOffer)
    {
        $this->jobOffer = $jobOffer;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }



    /**
     * Get the value of student
     */ 
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set the value of student
     *
     * @return  self
     */ 
    public function setStudent($student)
    {
        $this->student = $student;

        return $this;
    }
}