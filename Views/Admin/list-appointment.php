<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "Admin/nav-admin.php");
require('fpdf/fpdf.php');
?>

<body class="grey darken-3">
    <section style="min-height: 100%">
        <div class="row">
            <?php
            if (!empty($fileList)) {
                foreach ($fileList as $file) {
                    $id = $file->getAppointmentId();
            ?>

                    <div class="  light-blue darken-4 card col s2" style="min-height: 400px;margin:10px;border-radius: 5px;">
                        <div class=" indigo-darken-4-text text-accent-3">
                            <span class="right align"><b> Fecha: </b><?= $file->getDate(); ?></span>
                        </div>
                        <div class=" white-text  ">
                            <h4> <b>Compania:</b> <br> <?= $file->getJobOffer()->getCompany()->getNameCompany() ?></h4>
                        </div>
                        <div class=" white-text ">
                            <b> Estudiante :</b> <?= $file->getStudent()->getFirstName(); ?> <?= $file->getStudent()->getLastName(); ?>
                        </div>
                        <div class="    col s12 white-text ">
                            <b> Posicion de trabajo:</b> <?= $file->getJobOffer()->getJobPosition()->getDescription() ?>
                        </div>
                        <div class="    col s12 white-text " style="margin-bottom:10px ;">
                            <b> Carrera:</b> <?= $file->getJobOffer()->getJobPosition()->getCareer()->getDescription() ?>
                        </div>

                        <a href="<?= FRONT_ROOT . "admin/deleteAppointment?varId=$id" ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">delete_forever</i></a>

                        <div class=" card-panel  purple darken-1 col s12 ">
                            <h5 class="white-text">Curriculum Vitae</h5>
                            <a href="<?= $file->getCv() ?>>" download>
                                <img class="col s 4" src="<?= IMG_PATH ?>/PDF_file_icon.svg" alt="" width="35" height="35">
                                <p class="white-text col s 8"><?= $file->getCv(); ?></p>
                            </a>
                        </div>
                        <div class="  white-text ">
                        <b>Mensaje:</b>
                            <?= $file->getMessage() ?>
                        </div>

                        <div class="white-text  " style="margin-top: 20px">
                        <b>Requerimiento:</b> <?= $file->getJobOffer()->getRequirements() ?>
                        </div>

                    </div>
                    <!-- <div class="col s1">

                    </div> -->
                <?php
                }
            } else {
                ?>
                <div class="row ">
                    <div class="card-Panel cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
                        <h2 align="center"> <i class="Medium red-text material-icons">error</i> Lo sentimos.</h2>
                        <p align="Center" style="margin: 20px ">En este momento no hay Postulaciones laborales disponible
                        </p>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</body>