<?php

namespace Models;

class Appointment
{
    private $apointmentId;
    private $student;
    private $jobOffer;
    private $cv;
    private $message;

    /**
     * @param $apointmentId
     * @param $jobOffer
     * @param $cv
     * @param $message
     */
    public function __construct($apointmentId='', $jobOffer='', $cv='', $message='')
    {
        $this->apointmentId = $apointmentId;
        $this->jobOffer = $jobOffer;
        $this->cv = $cv;
        $this->message = $message;
    }


    /**
     * @return mixed
     */
    public function getApointmentId()
    {
        return $this->apointmentId;
    }

    /**
     * @param mixed $apointmentId
     */
    public function setApointmentId($apointmentId)
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


}