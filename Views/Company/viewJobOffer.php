<?php
require_once(VIEWS_PATH . "company/nav-company.php");
//$companyDAO=\DAO\CompanyDAO::getInstance();
//var_dump($companyDAO->searchById($_SESSION['loggedUser']->getCompany()));
?>

<body class="grey darken-3">
<section style="min-height: 100%">

<?php
$i=0;
if(!empty($jobOfferList)){

foreach ($jobOfferList as $jo) {
    $i=$i+1;
    $id = $jo->getJobOfferId();
    $img=$jo->getFlyer();
    ?>
    <table class="blue center-align" style="margin:20px;max-width:80%;">

        <caption class="black white-text left-align" >#<?=$i?></caption>
        <tbody>
        <tr >
            <td>ID:<?= $jo->getJobOfferId(); ?></td>
            <td>Compania:<?= $jo->getCompany()->getNameCompany(); ?></td>
            <td>Puesto laboral:<?= $jo->getJobPosition()->getDescription(); ?></td>
            <td>Carerra:<?= $jo->getJobPosition()->getCareer()->getDescription() ?></td>
            <td>Requisito: <?= $jo->getRequirements(); ?></td>
            <td>Fecha de Expiracion: <?=$jo->getDateExpiration();?></td>
            <td><a href="<?= FRONT_ROOT . "image/showImage?varController=CompanyPanel&varRoute=$img" ?>"
                   class="btn-floating green"><i class="material-icons">image</i></a>
            </td>
            <td><a href="<?= FRONT_ROOT . "CompanyPanel/showModifyJobOffer?varId=$id" ?>"
                   class="btn-floating deep-purple accent-4"><i class="material-icons">mode_edit</i></a></td>
            <td><a href="<?= FRONT_ROOT . "PDF/dowloadPDF?varId=$id&varController=CompanyPanel" ?>"
                   class="btn-floating red"><i class="material-icons">picture_as_pdf</i></a></td>

        </tr>
        <?php
        $appointmentList=$appointmentDAO->getAllbyJobOffer($id);
        if(!empty($appointmentList)){
            ?>
        <table class="orange"style="margin:20px;max-width:80%;">
            <caption class="black white-text">Appoinments</caption>
            <thead>
            <th>id</th>
            <th>Estudiante</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
            <th>Cv</th>
            <th></th>
            </thead>
            <tbody>
           <?php
            foreach ( $appointmentList  as $value)
            {
                $ai=$ai+1;
                ?>
                <tr>
                    <td><?=$value->getAppointmentId()?></td>
                    <td><?=$value->getStudent()->getFirstName()." ".$value->getStudent()->getLastName()?></td>
                    <td><?=$value->getStudent()->getEmail();?></td>
                    <td><?=$value->getMessage();?></td>
                    <td><?=$value->getDate();?></td>
                    <td><a  class="btn-floating red"  href="<?= $value->getCv() ?>>" download><i class="material-icons">picture_as_pdf</i> </a></td>
                </tr>
            <?php
            }
            }
            ?>

            </tbody>
        </table>
        </tbody>
    </table>

    <?php

}
    }else{
    ?>
    <div class="row " style="margin-left: 10px; margin-right:10px;">
        <div class="card-Panel  cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
            <h2 align="center"><i class="Medium red-text material-icons">error</i> Lo sentimos.</h2>
            <p align="Center" style="margin: 20px ">En este momento no hay ofertas laborales disponible.
            </p>
            <br>
            <p align="center">Muchas gracias.</p>
        </div>
    </div>
<?php
}
?>
</section>
</body>
