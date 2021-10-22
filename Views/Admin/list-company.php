<?php
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;

require_once(VIEWS_PATH."Admin/nav-admin.php");

?>
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
    </div>
</div>
</body>
