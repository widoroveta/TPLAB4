<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "student/nav-student.php");

?>

<body class="grey darken-3">
<div class="row">

    <?php
    if(!empty($jobOfferList)){
     ?>    <form action="<?= FRONT_ROOT . "" ?>" method="post">
        <div class=" col s12">
            <div class="card-panel cols 5 push-s2">
                <input type="text" name="name" class="col s12 m6 l3 " placeholder="Nombre a buscar">
                <button type="submit" class="btn waves-effect waves-light black blue-text"><i
                            class="center material-icons">search</i>
                </button>
            </div>
        </div>
    </form>
    <?php
    foreach ($jobOfferList as $jobOffer) {
        ?>

        <?php $id = $jobOffer->getJobOfferId(); ?>
        <div class="col s3 ">
            <div class="card " style="border-radius: 10px;">
                <div class="card-content card-content  z-depth-4 black purple-text text-accent-2"
                     style="min-height: 250px;border-radius: 10px 10px 0 0;">
                    <span class="card-title"><b><?= "#" . $jobOffer->getJobOfferId() . $jobOffer->getCompany()->getNameCompany() ?></b></span>
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
    }else{
        ?>
            <div class="row ">
        <div class="card-Panel  amber lighten-1 col s6 push-s3" style="border-radius: 20px ">
              <h2 align="center"> <i class="Medium red-text material-icons">error</i>  Lo sentimos.</h2>
            <p align="justify" style="margin: 20px ">En este momento no hay ofertas laborales disponible ya sea por tu carrera o por cualquier otra indole.Regrese por favor mas tarde.
           </p>
            <br> <p align="center">Muchas gracias.</p>
        </div>
            </div>
    <?php
    }
    ?>

</div>


</body>
