<?php

namespace DAO;

use Models\User as User;
use DAO\Connection as Connection;
use \PDOException as PDOException;

class UserDAO
{
    protected static $instance = null;
    private $conecction;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new UserDAO();
        }

        return self::$instance;
    }
    public function add($user)
    {
        $sqlQuery = "INSERT INTO users (studentId,`password`) VALUES(:studentId,:password)";
        $parameters['studentId'] = $user->getStudent()->getStudentId();
        $parameters['password'] = $user->getPassword();
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters,0);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}