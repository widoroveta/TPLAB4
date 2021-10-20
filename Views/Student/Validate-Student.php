<?php


if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser'] == 'admin') {
    $message = 'Por favor inicie sesion';
    header('location:' . FRONT_ROOT . "home/index?varMessage=$message");
}