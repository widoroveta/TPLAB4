<?php
namespace Models;
use Models\JobPosition as JobPosition;

class JobOffer {
    private $jobOfferId;
    private $jobPosition;
    private $company;
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


}
?>
