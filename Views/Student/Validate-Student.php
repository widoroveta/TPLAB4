<?php


if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->getRole()!=1) {
  $message = 'Por favor inicie sesion';
    header('location:' . FRONT_ROOT . "home/index?varMessage=$message");
}