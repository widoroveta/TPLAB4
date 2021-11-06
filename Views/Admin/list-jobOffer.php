
<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "Admin/nav-admin.php");
?>

<body class="grey darken-3">
<div class="row">
    <?php
    foreach ($jobOfferList as $jobOffer) {
        ?>

<?php $id= $jobOffer->getJobOfferId() ;?>
        <div class="col s3 ">
            <div class="card ">
                <a class="btn-floating halfway-fab waves-effect waves-light deep-purple accent-4"><i class="material-icons">mode_edit</i></a>

                <div class="card-content  z-depth-4 black purple-text text-accent-2">
                    <span class="card-title"><b><?= "#" . $jobOffer->getJobOfferId() . $jobOffer->getCompany()->getNameCompany() ?></b></span>
                    <ul>
                        <li><b>Description:</b> <?= $jobOffer->getJobPosition()->getDescription() ?></li>
                        <li><b>Carrera:</b> <?= $jobOffer->getJobPosition()->getCareer()->getDescription() ?></li>
                        <li><b>Requerimientos:</b><?= $jobOffer->getRequirements() ?></li>

                    </ul>
                </div>

            </div>
        </div>

        <?php
    }
    ?>

</div>

</body>