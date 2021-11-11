<?php
require_once (VIEWS_PATH."nav.php");
require_once (VIEWS_PATH."Admin/nav-admin.php");
?>
<body class="grey darken-3">
<div class="row">
    <?php
    foreach ($fileList as $file) {
        ?>
        <?php


        ?>
        <div class=" purple darken-4 card col s3" style="min-height: 400px;">
            <div class=" light-green-text text-accent-3">
                <span class="right align">    <?=$file->getDate();?></span>
            </div>
            <div class=" white-text  ">
                <h4>  Compania: <?= $file->getJobOffer()->getCompany()->getNameCompany() ?></h4>
            </div>
            <div class=" white-text ">
                Estudiante : <?= $file->getStudent()->getFirstName();?>  <?= $file->getStudent()->getLastName();?>
            </div>
            <div class="    col s12 white-text ">
                Posicion de trabajo: <?= $file->getJobOffer()->getJobPosition()->getDescription()?>
            </div>    <div class="    col s12 white-text ">
                Carrera: <?= $file->getJobOffer()->getJobPosition()->getCareer()->getDescription()?>
            </div>
            <div class=" card-panel  purple darken-1 col s12 ">
                <h5 class="white-text">Curriculum Vitae</h5>
                <a href="<?= $file->getCv() ?>>" download>
                    <img class="col s 4" src="<?= IMG_PATH ?>/PDF_file_icon.svg" alt="" width="35" height="35">
                    <p class="white-text col s 8"><?= $file->getCv(); ?></p>
                </a>
            </div>
            <div class="  white-text ">
                Mensaje:
                <?=$file->getMessage()?>
            </div>

            <div class="white-text  " style="margin-top: 20px">
                Requerimiento: <?= $file->getJobOffer()->getRequirements()?>
            </div>

        </div>
        <?php
    }
    ?>
</div>
</body>