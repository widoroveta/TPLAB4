<?php

namespace DAO;

class AppointmentDAO
{
    private $conecction;
    protected static $instance = null;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new AppointmentDAO();
        }

        return self::$instance;
    }
    public static function add($appointment)
    {

    }

}