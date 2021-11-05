// TODO hacer busqueda de usuario por email y mostrar solo los activos
<body class="grey darken-3">
<?php
require_once(VIEWS_PATH . "Admin/nav-admin.php");

?>
<div class="row">
    <div>
        <div class="card-panel">
            <form action="" class="cols 6">
                <input type="text" class="col s4" placeholder="Selecciona por email">


                <button type="submit" class=" btn waves-effect waves-light purple accent-4"><i
                            class="small  material-icons ">search</i></button>

            </form>
            <form action="" class="col s2 push-s1">
                <label> <input type="checkbox" class="filled-in"/>
                    <span>solo activos</span></label>
            </form>
        </div>
    </div>
</div>
<table class="highlight white-text">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI</th>
        <th>Genero</th>
        <th>Carrera</th>
        <th>Email</th>
        <th>Cumpleaños</th>
        <th>Numero de telefono</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>

    <?php
    function activateColor($activate)
    {
        if ($activate) {
            return '<i class="material-icons green-text">check</i>';
        } else {
            return '<i class="material-icons red-text">cancel</i>';
        }
    }

    foreach ($studentList as $std) {
        $std->setCareer($careerDAO->getCareerById($std->getCareer()));
        ?>
        <tr>
            <td><?= $std->getFirstName() ?></td>
            <td><?= $std->getLastName() ?></td>
            <td><?= $std->getDni() ?></td>
            <td><?= $std->getGender() ?></td>
            <td><?= $std->getCareer()->getDescription() ?></td>
            <td><?= $std->getEmail() ?></td>
            <td><?= $std->getBirthDate() ?></td>
            <td><?= $std->getPhoneNumber() ?></td>
            <td><?= activateColor($std->getActive()) ?></td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>
</body>