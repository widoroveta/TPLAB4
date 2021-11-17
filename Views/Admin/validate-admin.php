<?php

if(!isset($_SESSION['loggedUser'])||$_SESSION['loggedUser']->getRole()!=2)
{
    $message='Sin permiso para entrar';
    header('location:'.FRONT_ROOT."home/index?varMessage=$message");
}
