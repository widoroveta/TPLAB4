<?php

namespace Models;
class Company
{

    private $companyId;
    private $nameCompany;
    private $city;
    private $address;
    private $size;
    private $email;
    private $phoneNumber;
    private $cuit;

    /**
     * @param $companyId
     * @param $nameCompany
     * @param $city
     * @param $address
     * @param $size
     * @param $email
     * @param $phoneNumber
     * @param $cuit
     */
    public function __construct($companyId="", $nameCompany="", $city="", $address="", $size="", $email="", $phoneNumber="", $cuit="")
    {
        $this->companyId = $companyId;
        $this->nameCompany = $nameCompany;
        $this->city = $city;
        $this->address = $address;
        $this->size = $size;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->cuit = $cuit;
    }


    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param mixed $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }



    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }


    /**
     * Get the value of nameCompany
     */
    public function getNameCompany()
    {
        return $this->nameCompany;
    }

    /**
     * Set the value of nameCompany
     *
     * @return  self
     */
    public function setNameCompany($nameCompany)
    {
        $this->nameCompany = $nameCompany;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of type
     */


    /**
     * Get the value of size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}

?>