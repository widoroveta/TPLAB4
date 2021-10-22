<?php
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;
require_once (VIEWS_PATH."Student/nav-student.php");

?>

<form action="<?=FRONT_ROOT."StudentMagnament/showListCompany"?>" method="post">
 <div class="row">

     <input type="text"  name="name" class="col s12 m6 l3 " placeholder="Nombre a buscar">
    <button type="submit" class="btn waves-effect waves-light black blue-text" ><i class="center material-icons">search</i></button>
 </div>
</form>
<body class="grey darken-3">
<div class="row">
    <div class="col s12 m4 l8">
        <table class="striped lime lighten-3">
            <thead>
            <tr>

                <th>Nombre Compania</th>
                <th>Ciudad </th>
                <th>Direccion </th>
                <th>Tamaño </th>
                <th>Email</th>
                <th>Telefono</th>
                <th>CUIT</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($companySelected))
            foreach($companyList as $company)
            {
                $id=$company->getCompanyId()
                ?>
                <tr>


                    <td><?=$company->getNameCompany()?></td>
                    <td><?=$company->getCity()?></td>
                    <td><?=$company->getAddress()?></td>
                    <td><?=$company->getSize()?></td>
                    <td><?=$company->getEmail()?></td>
                    <td><?=$company->getPhoneNumber()?></td>
                    <td><?=$company->getCuit()?></td>

                </tr>
                <?php
            } else
            {

                ?>
                <td><?=$companySelected->getNameCompany()?></td>
                <td><?=$companySelected->getCity()?></td>
                <td><?=$companySelected->getAddress()?></td>
                <td><?=$companySelected->getSize()?></td>
                <td><?=$companySelected->getEmail()?></td>
                <td><?=$companySelected->getPhoneNumber()?></td>
                <td><?=$companySelected->getCuit()?></td>
               <td> <a href="<?=FRONT_ROOT."StudentMagnament/showListCompany?varName=null"?>" class="waves-effect waves-light btn-small red">Volver</a></td>
            <?php
            }

            ?>
            </tbody>

        </table>
    </div>
</div>
</body>

