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
        <div class="card col s4">
            <div class="card-panel white-text black ">
                Compania: <?= $file->getJobOffer()->getCompany()->getNameCompany() ?>
            </div>
            <div class="card-panel  col s12 lime lighten-2 ">
                Estudiante : <?= $file->getStudent()->getFirstName();?>  <?= $file->getStudent()->getLastName();?>
            </div>
            <div class="card-panel   white-text  col s12 teal darken-4  ">
              Puesto de trabajo: <?= $file->getJobOffer()->getJobPosition()->getDescription()?>
            </div>

            <div class=" card-panel white col s12 ">
                <h5>Curriculum Vitae</h5>
                <a href="<?= $file->getCv() ?>>" download>
                    <img class="col s 4" src="<?= IMG_PATH ?>/PDF_file_icon.svg" alt="" width="35" height="35">
                    <p class="col s 8"><?= $file->getCv(); ?></p>
                </a>
            </div>
            <div class="card-panel  white-text  col s 12 grey">
                Mensaje:
                <?=$file->getMessage()?>
            </div>
            <div class="card-panel white-text   light-blue darken-4 col s12 ">
                Requerimiento: <?= $file->getJobOffer()->getRequirements()?>
            </div>

        </div>
        <?php
    }
    ?>
</div>
</body>