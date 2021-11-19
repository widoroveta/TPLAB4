<?php
namespace Models;
use Models\JobPosition as JobPosition;

class JobOffer
{
    private $jobOfferId;
    private $jobPosition;
    private $company;
    private $requirements;
    private $flyer;
    private $dateExpiration ;

    /**
     * @param $jobOfferId
     * @param $jobPosition
     * @param $company
     * @param $requirements
     * @param $flyer
     * @param $date
     */
    public function __construct($jobOfferId='', $jobPosition='', $company='', $requirements='', $flyer='', $dateExpiration ='')
    {
        $this->jobOfferId = $jobOfferId;
        $this->jobPosition = $jobPosition;
        $this->company = $company;
        $this->requirements = $requirements;
        $this->flyer = $flyer;
        $this->dateExpiration  = $dateExpiration ;
    }

    /**
     * @return mixed
     */
    public function getJobOfferId()
    {
        return $this->jobOfferId;
    }

    /**
     * @param mixed $jobOfferId
     */
    public function setJobOfferId($jobOfferId)
    {
        $this->jobOfferId = $jobOfferId;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param mixed $requirements
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return mixed
     */
    public function getFlyer()
    {
        return $this->flyer;
    }

    /**
     * @param mixed $flyer
     */
    public function setFlyer($flyer)
    {
        $this->flyer = $flyer;
    }

    /**
     * @return mixed
     */
    public function getDateExpiration ()
    {
        return $this->dateExpiration ;
    }

    /**
     * @param mixed $date
     */
    public function setDateExpiration ($date)
    {
        $this->dateExpiration  = $date;
    }

}
?>
