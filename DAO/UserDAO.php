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
       if(!$this->searchByStudentId($user->getStudent()->getStudentId())){
        $sqlQuery = "INSERT INTO users (studentId,`password`,role,email,companyId) VALUES(:studentId,:password,:role,:email,:companyId)";
        $parameters['studentId'] = $user->getStudent()->getStudentId();
        $parameters['password'] = $user->getPassword();
        $parameters['role']=$user->getRole();
        $parameters['email']=$user->getEmail();
        $parameters['companyId']=$user->getCompany();
        try {
            $this->conecction = Connection::GetInstance();
            return $this->conecction->ExecuteNonQuery($sqlQuery, $parameters,0);
        } catch (PDOException $ex) {
            throw $ex;
        }
       }else{
           return null;
       }

    }
    public function searchByStudentId($id){

        $sqlQuery="select * from users where (studentId = :studentId)";
        $parameters['studentId'] = $id;

        try {
            $this->conecction = Connection::GetInstance();
           $resultSet= $this->conecction->Execute($sqlQuery, $parameters);

        } catch (PDOException $ex) {
            throw $ex;
        }
        if(!empty($resultSet))
        {
            $user = $this->mapout($resultSet);
        }
        else
        {
            $user = false;
        }

        return $user;
    }
    public function searchByEmail($email){
        $sqlQuery="select * from users where (email = :email)";
        $parameters['email'] = $email;

        try {
            $this->conecction = Connection::GetInstance();
            $resultSet= $this->conecction->Execute($sqlQuery, $parameters);
     //       var_dump($resultSet);
        } catch (PDOException $ex) {
            throw $ex;
        }
        if(!empty($resultSet))
        {
            $user = $this->mapout($resultSet);
        }
        else
        {
            $user = false;

        }

        return $user;
    }

    public function mapout ($value)
    {
        $studentDAO=StudentDAO::getInstance();
        $studentDAO->getAll();
        $value = is_array($value) ? $value : [];

        $resp = array_map(function($p){
            $studentDAO=StudentDAO::getInstance();
            return new User($p['id'], $studentDAO->searchById($p['studentId']), $p['password'],$p['email'],$p['role'],$p['companyId']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }
}