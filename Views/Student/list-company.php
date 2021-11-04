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
<div class="row">

    <?php
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
                    <div class="collection">
                        <a href="#!" class="collection-item">Alvin</a>
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
                    <a href="<?= FRONT_ROOT . "StudentMagnament/showListCompany?varName=null" ?>" class="red-text text-accent-4">volver</a>

                </div>
            </div>
        </div>

        <?php
    }

    ?>
    </tbody>

    </table>
</div>
</div>
</body>

