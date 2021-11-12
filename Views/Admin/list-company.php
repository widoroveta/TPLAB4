<?php
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;

require_once(VIEWS_PATH."Admin/nav-admin.php");

?>
<body class="grey darken-3" >
<div class="row">
    <div class="col s12 m4 l8">
        <?php
        if(!empty($companyList)){
        ?>
    <table class="highlight black cyan-text text-accent-4">
        <thead>
        <tr>

            <th>Nombre Compania</th>
            <th>Ciudad </th>
            <th>Direccion </th>
            <th>Tamaño </th>
            <th>Email</th>
            <th>Telefono</th>
            <th>CUIT</th>
            <th>Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php

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
           <td>
               <a href="<?=FRONT_ROOT."Admin/showPanelModifyCompany?varId=$id"?>" class="waves-effect waves-light btn black">Modificar</a>
           </td>
                </tr>
                    <?php
        }
        ?>
        </tbody>

    </table>
        <?php
        }else{?>
            <div class="row ">
            <div class="card-Panel cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
                <h2 align="center"><i class="Medium red-text material-icons">error</i> Lo sentimos.</h2>
                <p align="center" style="margin: 20px ">En este momento no hay Postulaciones antiguas
            </p>
                <br>
                <p align="center">Muchas gracias.</p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</body>

