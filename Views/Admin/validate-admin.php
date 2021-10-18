<?php

if(!isset($_SESSION['loggedUser'])||$_SESSION['loggedUser']!='admin')
{
    $message='Sin permiso para entrar';
    header('location:'.FRONT_ROOT."home/index?varMessage=$message");
}
