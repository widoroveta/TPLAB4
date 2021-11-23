<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "Admin/nav-admin.php");


if (!empty($message)) {

?>
<script>
    var toastHTML = '<span> <?=$message?> </span>';
    M.toast({html: toastHTML,
        classes: " red accent-4",
        displayLength: 5000
    });
</script>
<?php
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
    });
</script>
<body class="grey darken-3">
<?php
if (!empty($jobOfferList)) {
    ?>
    <div class="row">
        <?php

        foreach ($jobOfferList as $jobOffer) {
            ?>

            <?php $id = $jobOffer->getJobOfferId();
                $img=FRONT_ROOT . $jobOffer->getFlyer();
                ?>
            <div class="col s3 ">
                <div class="card ">
                    <div class="card-image">



<!--                                               // <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>-->
                    </div>


                    <div class="card-content  z-depth-4 black purple-text text-accent-2" style="min-height: 200px">
                        <span class="card-title"><b><?= "#" . $jobOffer->getJobOfferId() . $jobOffer->getCompany()->getNameCompany() ?></b></span>
                        <ul>
                            <li><b>Description:</b> <?= $jobOffer->getJobPosition()->getDescription() ?></li>
                            <li><b>Carrera:</b> <?= $jobOffer->getJobPosition()->getCareer()->getDescription() ?></li>
                            <li><b>Requerimientos:</b><?= $jobOffer->getRequirements() ?></li>
                    </div>
                    <div class="black"><a href="<?= FRONT_ROOT . "admin/showModifyJobOffer?varId=$id" ?>"
                                          class="btn-floating waves-effect waves-light deep-purple accent-4"><i
                                    class="material-icons">mode_edit</i></a>
                        <a href="<?=FRONT_ROOT."PDF/dowloadPDF?varId=$id&varController=admin"?>" class="btn-floating  waves-effect waves-light red"><i class="material-icons">picture_as_pdf</i></a>
                        <a  href="<?=FRONT_ROOT."image/showImage?varController=admin&varRoute=$img"?>" class="btn-floating  waves-effect waves-light green"><i class="material-icons">image</i></a>
                    </div>
                </div>
            </div>

            <?php
        }

        ?>

    </div>
    <?php
} else {
    ?>
    <div class="row ">
        <div class="card-Panel  cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
            <h2 align="center"><i class="Medium red-text material-icons">error</i> Lo sentimos.</h2>
            <p align="Center" style="margin: 20px ">En este momento no hay ofertas laborales disponible.
            </p>
            <br>
            <p align="center">Muchas gracias.</p>
        </div>
    </div><?php
}
?>
</body>