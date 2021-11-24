<?php

use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;

require_once(VIEWS_PATH . "Student/nav-student.php");

?>

<form action="<?= FRONT_ROOT . "StudentMagnament/showListCompany" ?>" method="post">
    <div class="row">

        <input type="text" name="name" class="col s12 m6 l3 " placeholder="Nombre a buscar">
        <button type="submit" class="btn waves-effect waves-light black blue-text"><i class="center material-icons">search</i>
        </button>
    </div>
</form>
<body class="grey darken-3">
<section style="min-height: 100%">
<div class="row">

    <?php
    if(!empty($companyList) || !empty($companySelected)){
    if (!isset($companySelected))
        foreach ($companyList as $company) {
            $id = $company->getCompanyId()
            ?>
            <div class="col s3 ">
                <div class="card ">
                    <div class="card-content card-content  z-depth-4 black purple-text text-accent-2">
                        <span class="card-title"><b><?= $company->getNameCompany() ?></b></span>
                        <ul>
                            <li><b>Ciudad:</b> <?= $company->getCity() ?></li>
                            <li><b>Direccion:</b> <?= $company->getAddress() ?></li>
                            <li><b>Tamaño:</b><?= $company->getSize() ?></li>
                            <li><b>Email:</b> <?= $company->getEmail() ?></li>
                            <li><b>Telefono: </b><?= $company->getPhoneNumber() ?></li>
                            <li><b>Cuit: </b><?= $company->getCuit() ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
        } else {

        ?>
        <div class="col s3 ">
            <div class="card blue-grey " >
                <div class="card-content  z-depth-4 black purple-text text-accent-2">
                    <span class="card-title"><b><?= $companySelected->getNameCompany() ?></b></span>
                    <ul>
                        <li><b>Ciudad:</b> <?= $companySelected->getCity() ?></li>
                        <li><b>Direccion:</b> <?= $companySelected->getAddress() ?></li>
                        <li><b>Tamaño:</b><?= $companySelected->getSize() ?></li>
                        <li><b>Email:</b> <?= $companySelected->getEmail() ?></li>
                        <li><b>Telefono: </b><?= $companySelected->getPhoneNumber() ?></li>
                        <li><b>Cuit: </b><?= $companySelected->getCuit() ?></li>
                    </ul>
                </div>
                <div class="card-action z-depth-4 black purple-text text-accent-2 ">
                    <?php
                    $varName='';
                    ?>
                    <a href="<?= FRONT_ROOT . "StudentMagnament/showListCompany?varName=$varName" ?>" class="red-text text-accent-4">volver</a>

                </div>
            </div>
        </div>

        <?php
    }
    }else{
    ?>
        <div class="row ">
            <div class="card-Panel  cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
                <h2 align="center"> <i class="Medium red-text material-icons">error</i>  Lo sentimos.</h2>
                <p align="Center" style="margin: 20px ">En este momento no hay compañias disponible.
                </p>
                <br> <p align="center">Muchas gracias.</p>
            </div>
        </div>
    <?php

    }
    ?>
</div>
    </body>

