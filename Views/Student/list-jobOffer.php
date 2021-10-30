<?php
require_once(VIEWS_PATH."nav.php");
require_once (VIEWS_PATH."student/nav-student.php");
?><body class="grey darken-3">
<div class="row">
    <?php
    foreach ($jobOfferList as $jobOffer){
    ?>


        <div class="col s3 ">
            <div class="card ">
                <div class="card-content card-content  z-depth-4 black purple-text text-accent-2">
                    <span class="card-title"><b><?="#".$jobOffer->getJobOfferId(). $jobOffer->getCompany()->getNameCompany() ?></b></span>
                    <ul>
                        <li><b>Description:</b> <?= $jobOffer->getJobPosition()->getDescription()?></li>
                        <li><b>Careera:</b> <?=$jobOffer->getJobPosition()->getCareer()->getDescription() ?></li>
                        <li><b>Requerimientos:</b><?= $jobOffer->getRequirements()?></li>

                    </ul>
                </div>
                                    <div class="card-action">
                                        purple darken-4

                                        <a class="btn-floating btn-large waves-effect waves-light  purple darken-4"><i class="material-icons">add</i></a>

                                    </div>
            </div>
        </div>

        <?php
        }
        ?>

    </div>


</body>
