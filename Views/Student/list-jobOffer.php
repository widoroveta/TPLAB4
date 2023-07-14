<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "student/nav-student.php");

?>

<body class="grey darken-3">
<section style="min-height: 100%">
<div class="row">

    <?php
    if(!empty($jobOfferList)){
     ?>
        <div class=" col s6">
            <div class="card-panel col s8 ">
                <form action="<?=FRONT_ROOT."StudentMagnament/showJobOfferList"?>" method="post">
                <input type="text" name="name"  placeholder="Nombre a buscar">
                <button type="submit" class="btn waves-effect waves-light black blue-text"><i
                            class="center material-icons">search</i>

                </button>
                </form>
            </div>
        </div>
        <div class="col s12">
    <?php
    foreach ($jobOfferList as $jobOffer) {
        ?>

        <?php $id = $jobOffer->getJobOfferId(); ?>

        <div class="col s ">
            <div class="card " style="border-radius: 10px;">
                <div class="card-content card-content  z-depth-4 black purple-text text-accent-2"
                     style="min-height: 250px;border-radius: 10px 10px 0 0;">
                    <span class="card-title"><b><?= "# " . $jobOffer->getJobOfferId() ?><b><p style="text-transform: uppercase;"><?=  $jobOffer->getCompany()->getNameCompany()  ?></p></b></b></span>
                    <ul>
                        <li><b>Description:</b> <?= $jobOffer->getJobPosition()->getDescription() ?></li>
                        <li><b>Careera:</b> <?= $jobOffer->getJobPosition()->getCareer()->getDescription() ?></li>
                        <li><b>Requerimientos:</b><?= $jobOffer->getRequirements() ?></li>

                    </ul>
                </div>
                <div class="card-action z-depth-4 black purple-text text-accent-2 " style="border-radius:0 0 10px 10px ;">


                    <a href="<?= FRONT_ROOT . "StudentMagnament/showAddAppointment?varId=$id" ?>"
                       class="btn-floating btn-large waves-effect waves-light  purple darken-4  "><i
                                class="material-icons">add</i></a>

                </div>
            </div>
        </div>

        <?php
    }
    ?>
        </div>
            <?php
    }else{
        ?>

            <div class="row ">
        <div class="card-Panel  cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
              <h2 align="center"> <i class="Medium red-text material-icons">error</i>  Lo sentimos.</h2>
            <p align="Center" style="margin: 20px ">En este momento no hay ofertas laborales disponible ya sea por tu carrera o por cualquier otra indole.Regrese por favor mas tarde.
           </p>
            <br> <p align="center">Muchas gracias.</p>
        </div>
            </div>
    <?php
    }
    ?>

</div>

</section>
</body>
