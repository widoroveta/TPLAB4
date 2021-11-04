<?php

namespace Models;

class Appointment
{
    private $appointmentId;
    private $student;
    private $jobOffer;
    private $cv;
    private $message;

    /**
     * @param $student
     * @param $jobOffer
     * @param $cv
     * @param $message
     */
    public function __construct($student='', $jobOffer='', $cv='', $message='')
    {
        $this->student = $student;
        $this->jobOffer = $jobOffer;
        $this->cv = $cv;
        $this->message = $message;
    }

    /**
     * @param $apointmentId
     * @param $jobOffer
     * @param $cv
     * @param $message
     */
    


    /**
     * @return mixed
     */
    public function getAppointmentId()
    {
        return $this->apointmentId;
    }

    /**
     * @param mixed $apointmentId
     */
    public function setAppointmentId($apointmentId)
    {
        $this->apointmentId = $apointmentId;
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