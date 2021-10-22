<body class="grey darken-3">
<?php
require_once(VIEWS_PATH . "Admin/nav-admin.php");

?>

<table class="highlight">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI</th>
        <th>Genero</th>
        <th>Carrera</th>
        <th>Email</th>
        <th>Cumpleaño</th>
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