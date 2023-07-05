<?php
require_once(VIEWS_PATH . "header.php");
require_once(VIEWS_PATH . 'nav.php');

use Models\Career;
use DAO\CareerDAO;

$careerDao = new CareerDAO();


?>


<body class="grey darken-3">
    <section style="height: 100%">
        <div class="row">
            <div class="section col s12 white" style="padding-left: 30px;">
                <img src="https://mdp.utn.edu.ar/wp-content/uploads/2021/02/UTN_IsoLogoBcoNeg.png" alt="">

            </div>

            <div class="divider"></div>
            <div class=" section col s12 black cyan-text left" style="padding-left: 30px;">
                <h3>Servicio de busqueda laboral de la UTNMDP</h3>
                <p>Bienvenido al servicio gestionado por la Universidad Tecnologia Nacional regional de mar del plata , si usted
                    es un usuario activo podra solicitar empleo en la empresas registrada en nuestra web</p>
            </div>
        </div>
       

        <?php

        if (!empty($message)) {
            if ($message == 'Deberias registrarte') {
        ?>
                <script>
                    var toastHTML = '<span> <?= $message ?> </span><a class="waves-effect waves-light btn modal-trigger black" href="#modal1">Registrarse</a>';
                    M.toast({
                        html: toastHTML,
                        classes: " red accent-4",
                        displayLength: 5000
                    });
                </script><?php
                        } else {
                            if ($message == "Usuario registrado") {

                            ?>
                    <script>
                        var toastHTML = '<span><i class="tiny material-icons">close</i>  <?= $message ?></span>';
                        M.toast({
                            html: toastHTML,
                            classes: " green accent-3",
                            displayLength: 5000
                        });
                    </script>
                <?php
                            } else {
                ?>

                    <script>
                        var toastHTML = '<span><i class="tiny material-icons">close</i>  <?= $message ?></span>';
                        M.toast({
                            html: toastHTML,
                            classes: " red accent-4",
                            displayLength: 5000
                        });
                    </script>
        <?php
                            }
                        }
                    }
        ?>
        <?php

        ?>
    </section>
</body>