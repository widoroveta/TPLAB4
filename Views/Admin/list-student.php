<body class="grey darken-3">
    <section style="min-height: 100%">
        <?php
        require_once(VIEWS_PATH . "Admin/nav-admin.php");

        ?>

        <div class="row">
            <div>
                <div class="card-panel">
                    <form action="<?= FRONT_ROOT . "admin/showListStudent" ?>" name='form1' method="post" id='form-email' class="cols 6">
                        <input type='hidden' name="check" value="false">
                        <input type="text" class="col s4" name="email" placeholder="Selecciona por email">


                        <button type="submit" class=" btn waves-effect waves-light purple accent-4"><i class="small  material-icons ">search</i></button>

                    </form>

                    <form action="<?= FRONT_ROOT . "admin/showListStudent" ?>" name="form2" id='form-check' method='post' class="col s2 push-s1">
                        <label> <input name="check" type="checkbox" class="filled-in" />
                            <span>solo activos</span></label>
                        <button type="submit" class="withe" style="border:none;"><i class="tiny material-icons blue-text">refresh</i></button>
                    </form>
                </div>
            </div>
        </div>
        <table class="highlight white-text" style="margin:10px,20px,10px,20px;">
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
    </section>
</body>