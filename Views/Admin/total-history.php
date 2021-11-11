<?php
require_once (VIEWS_PATH.'nav.php');
require_once (VIEWS_PATH."Admin/nav-admin.php")
?>
<body class="grey darken-3">
<div class="row">
    <table class="highlight black orange-text text-accent-3">
        <thead>

        <th>
           Estudiante
        </th>  <th>
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
        foreach ($aol as $apOld)
        {

            ?>
            <tr>
                <td>
                    <?=$apOld->getStudent();?>
                </td>
                <td>
                    <?=$apOld->getNameCompany();?>
                </td>

                <td><?=$apOld->getJobPosition();?></td>
                <td><?=$apOld->getCareer();?></td>
                <td><?=$apOld->getDate();?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>