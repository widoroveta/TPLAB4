<?php
require_once(VIEWS_PATH . 'nav.php');
require_once(VIEWS_PATH . "Admin/nav-admin.php")
?>

<body class="grey darken-3">
    <section style="min-height: 100%">
        <?php
        if (!empty($aol)) {
        ?>
            <!-- ?> -->
            <div class="row">
                <table class="highlight black orange-text text-accent-3 push-m1 col s9" >
                    <thead>
                        <th>
                            Estudiante
                        </th>
                        <th>
                            Compania
                        </th>
                        <th>
                            Puesto de Trabajo
                        </th>
                        <th>
                            Carrera
                        </th>
                        <th>
                            Fecha
                        </th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($aol as $apOld) {

                        ?>
                            <tr>
                                <td>
                                    <?= $apOld->getStudent(); ?>
                                </td>
                                <td>
                                    <?= $apOld->getNameCompany(); ?>
                                </td>

                                <td><?= $apOld->getJobPosition(); ?></td>
                                <td><?= $apOld->getCareer(); ?></td>
                                <td><?= $apOld->getDate(); ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="row ">
                            <div class="card-Panel cyan darken-4 green-text  text-accent-2 col s6 push-s3" style="border-radius: 20px ">
                                <h2 align="center"><i class="Medium red-text material-icons">error</i> Lo sentimos.</h2>
                                <p align="center" style="margin: 20px ">En este momento no hay Postulaciones antiguas
                                </p>
                                <br>
                                <p align="center">Muchas gracias.</p>
                            </div>
                        </div>
                    <?php

                    }
                    ?>
                    </tbody>
                </table>
            </div>
    </section>
</body>