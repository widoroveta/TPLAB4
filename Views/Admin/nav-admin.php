<?php
require_once(VIEWS_PATH . "nav.php");


?>
<div class="nav-wrapper center-align z-depth-5 ">

  <div class="col s12 ">
    <a href="<?= FRONT_ROOT . "Admin/showListCompany" ?>" class="breadcrumb z-depth-5  cyan-text">Empresas</a>
    <a href="<?= FRONT_ROOT . 'Admin/showAddCompany' ?>" class="breadcrumb z-depth-5  cyan-text">Agregar Empresa</a>
    <a href="<?= FRONT_ROOT . "Admin/showListStudent" ?>" class="breadcrumb z-depth-5 cyan-text">Lista los alumnos </a>
    <a href="<?= FRONT_ROOT . "Admin/showAddJobOffer" ?>" class="breadcrumb z-depth-5  cyan-text">Agregar Ofertas de Trabajo </a>
    <a href="<?= FRONT_ROOT . "Admin/showValidateStudent" ?>" class="breadcrumb z-depth-5  cyan-text">Dar de alta usuario </a>
    <a href="<?= FRONT_ROOT . "Admin/showListAppoinment" ?>" class="breadcrumb z-depth-5  pink-text  cyan-text">Postulaciones vigentes </a>
    <a href="<?= FRONT_ROOT . "Admin/showListJobOffer" ?>" class="breadcrumb z-depth-5  pink-text  cyan-text">Puestos de trabajo </a>
    <a href="<?= FRONT_ROOT . "Admin/showTotalHistorial" ?>" class="breadcrumb z-depth-5  pink-text  cyan-text">Historial de postulaciones </a>

  </div>
</div>

<img src="<?= IMG_PATH . "bar.gif" ?>" alt="" style="position: relative; margin-bottom: 30px " height="5px" width="100%">