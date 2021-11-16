<?php

namespace Controllers;

use DAO\CareerDAO as CareerDAO;
use DAO\CompanyDAO;
use DAO\StudentDAO;
use DAO\UserDAO;
use  Models\User as User;

class HomeController
{

    public function index($message = "")
    {
        if (!isset($_SESSION['loggedUser'])) {
            require_once(VIEWS_PATH . 'home.php');
        } else {
            switch ($_SESSION['role']) {
                case 1:
                    header("location:" . FRONT_ROOT . "studentMagnament/showHomeStudent");
                    break;
                case 2:
                    header("location:" . FRONT_ROOT . "admin/showlistcompany");
                    break;
            }
        }
    }

    public
    function verifyEmail($email)
    {
        $user = UserDAO::getInstance();
        $studentDAO = StudentDAO::getInstance();

        $std = $studentDAO->searchByEmail($email);
        if ($std != null) {
            return $std;
        }

        return null;
    }

    public function login($email, $password)
    {
        $userDAO = UserDAO::getInstance();
        $studentDAO = StudentDAO::getInstance();
        $careerDAO = CareerDAO::getInstance();

        $user = $userDAO->searchByEmail($email);

        $std = $this->verifyEmail($email);
        if ($user != null) {
            if ($user->getRole() == '1') {

                if ($std->getActive()) {

                    $std->setCareer($careerDAO->searchById($std->getCareer()));
                    $user = new User();
                    $user = $userDAO->searchByStudentId($std->getStudentId());

                    if (strcasecmp($user->getPassword(), $password) == 0) {
                        $_SESSION["loggedUser"] = $std;
                        $_SESSION["role"] = 1;
                        $message = "Usuario encontrado";

                        header("location:" . FRONT_ROOT . "studentMagnament/showHomeStudent?varMessage=$message");
                    } else {
                        $message = 'Contraseña incorrecta';

                        $this->index($message);
                    }
                } else {
                    $message = 'Usuario no activo';

                    $this->index($message);
                }

            } elseif ($user->getRole() == '2') {
                if (strcasecmp($user->getPassword(), $password) == 0) {
                    $_SESSION['loggedUser'] = 'admin';
                    $_SESSION['role'] = 2;
                    header("location:" . FRONT_ROOT . "Admin/showListCompany");
                } else {
                    $message = "Contraseña incorrecta";

                    $this->index($message);
                }
            }
            elseif ($user->getRole()=="3")
            {
                $companyDAO=CompanyDAO::getInstance();
                $company=$companyDAO->searchById($user->getCompany());
                if (strcasecmp($user->getPassword(), $password) == 0) {
                    $id=$company->getCompanyId();
                    $_SESSION['loggedUser'] = $id;
                    $_SESSION['role'] = 3;
                    header("location:" . FRONT_ROOT . "companyPanel/showHomeCompany");
                } else {
                    $message = "Contraseña incorrecta";

                    $this->index($message);
                }
            }
        } else {
            if ($std) {
                $message = 'Deberias registrarte';

                $this->index($message);
            } else {
                $message = 'Este estudiante no existe';

                $this->index($message);
            }
        }

    }




//                        break;
//                    case
//                        2:
//                          if (strcasecmp($user->getPassword(), $password) == 0) {
//                              $_SESSION['loggedUser'] = 'admin';
//                              $_SESSION['role'] = 2;
//                              header("location:" . FRONT_ROOT . "Admin/showListCompany");
//                          } else {
//                              $message = "Contraseña incorrecta";
//
//                              $this->index($message);
//                          }
//
//                        break;
//
//
//                }
//
//            }
// else{
//            if($this->verifyEmail($email)){
//
//
//                    $message = "Usuario no activo";
//                    $this->index($message);
//
//            }
//
//        }
//        }

//if ($user != null) {
/* if (strcasecmp($user->getPassword(), $password) == 0){
     $_SESSION["loggedUser"] = $std;
     $_SESSION["role"]=1;
     $message = "Usuario encontrado";

     header("location:" . FRONT_ROOT . "studentMagnament/showHomeStudent?varMessage=$message");
 }
 else{
     $message = 'Contraseña incorrecta';

 $this->index($message);
 }
}else {
 $message = 'Deberias registrarte';

$this->index($message);
}
} else {

$message = "Usuario no activo";
$this->index($message);

}
} else {
$user = $userDAO->searchByEmail($email);
if ($user) {
if (strcasecmp($user->getPassword(), $password) == 0) {
 $_SESSION['loggedUser']='admin';
 $_SESSION['role']=2;
 header("location:".FRONT_ROOT."Admin/showListCompany");
} else {
 $message = "Contraseña incorrecta";

 $this->index($message);
}
} else {
$message = "Usuario no encontrado";

$this->index($message);
}
}*/


public
function register($email, $pass2)
{
    $studentDAO = StudentDAO::getInstance();
    $userDAO = UserDAO::getInstance();
    $student = $studentDAO->searchByEmail($email);
    if ($student != null) {
        if ($student->getActive()) {
            $user = new User();
            $user->setStudent($student);
            $user->setPassword($pass2);
            $user->setAdmin(0);
            $user->setEmail($email);
            $user->setRole(1);
            $user->setCompany(0);
            $validateUser = $userDAO->add($user);
            if ($validateUser) {
                $this->index("Usuario registrado");
            } else {
                $this->index("Este usuario ya habia sido registrado");
            }
        } else {
            $this->index("Este estudiante no esta activo");
        }

    } else {
        $this->index("No eres un estudiante de la UTN");
    }
}

public
function logout()
{

    $_SESSION['loggedUser'] = null;
    session_destroy();
    $this->index();

}
}
