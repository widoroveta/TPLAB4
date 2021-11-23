<?php
//require_once (VIEWS_PATH."company/nav-company.php");
//echo $company;
//echo $id;
//*

use DAO\JobOfferDAO as JobOfferDAO;
use Models\JobOffer as JobOffer;

require_once(VIEWS_PATH."Company/nav-company.php");

?><body class="grey darken-3" >
<div class="row">
    <div class="card col s8 push-s2">
        <div class="card-title">
            <h3><?='Bienvenido '.$userLogged->getCompany()->getNameCompany();?></h3>
        </div>
        <div class="card-content">
         <p>Estamos agradecido por su participacion como una de las tantas empresas, las cuales ofrecen oportunidades a los estudiantes de la Universidad Teconologica regional
         Mar del plata .
             <br>
             En el la barra de navegacion podra ver la funcionalidades de la pagina y ver las postulaciones de los estudiantes a la ofertas laborales que quieran ofrecerles.
         </p>
        </div>
    </div>
</div>
</body>
