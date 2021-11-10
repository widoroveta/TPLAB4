<body class="grey darken-3">
<?php
require_once(VIEWS_PATH . "Admin/nav-admin.php");

?>
<script>  document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });</script>
<table class="highlight white-text">
    <thead>
    <tr>

        <th>Nombre</th>
        <th>ID</th>
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
        $id=$std->getStudentId();
        ?>
        <tr>
            <td><?= $std->getFirstName() ?></td>
            <td><input name="id" type="text"  value="<?=$id?>"></td>
            <td><?= $std->getLastName() ?></td>
            <td><?= $std->getDni() ?></td>
            <td><?= $std->getGender() ?></td>
            <td><?= $std->getCareer()->getDescription() ?></td>
            <td><?= $std->getEmail() ?></td>
            <td><?= $std->getBirthDate() ?></td>
            <td><?= $std->getPhoneNumber() ?></td>
            <td><?= activateColor($std->getActive()) ?></td>
            <td>
                <button data-target="modal-register" value="<?=$id?>" name="button" onclick="getVar(<?=$id?>)" class="btn modal-trigger">Registrar</button>
            </td>
            <script>
                var jsvar;

                function getVar(id)
                {
                    jsvar = id;
                   //alert(jsvar);
                    document.getElementById("idModal").value=jsvar;
                }
            </script>
            <?php
            $php = "<script> document.writeln(jsvar); </script>"; // igualar el valor de la variable JavaScript a PHP
            ?>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>
</body>
<div id="modal-register" class="modal">
    <div class="modal-content">
        <div class="row">

            <div id="msg">


            <div id="error1" style="display: none;" class="card-panel   red" role="alert">
                Las Contraseñas no coinciden, vuelve a intentar !
            </div>
            <div id="ok1" style="display: none;" class="card-panel  green" role="alert">
                Las Contraseñas coinciden
            </div></div>
     <form action="<?= FRONT_ROOT.'admin/addNewUser'?>" method="post">

         <input type="hidden" value="" name="idModal" id="idModal">
         <div class="form-group">
             <label for="pass1">Contraseña</label>
             <input type="password" value="" placeholder="123456" onchange="verificarPasswords2(); return false" class="form-control" id="pass3"
                    required>
         </div>
         <div class="form-group">
             <label for="pass2">Vuelve a escribir la Contraseña</label>
             <input type="password" name="pass" placeholder="123456" value="" onchange="verificarPasswords2(); return false" class="form-control" id="pass4"
                    required>
         </div>

         <button type="submit" id="login1" class="btn btn-primary">Registrarse</button>
     </form>
            <script>
                function verificarPasswords2() {

                    // Ontenemos los valores de los campos de contraseñas
                    pass3 = document.getElementById('pass3');
                    pass4 = document.getElementById('pass4');
                    if (Boolean(pass4)) {
                        if (pass3.value != pass4.value) {
                            document.getElementById("error1").style.display = "block";
                            document.getElementById("ok1").style.display = 'none';
                            document.getElementById("Login1").style.display="none";


                        } else {
                            document.getElementById("error1").style.display = "none";
                            document.getElementById("ok1").style.display = 'block';
                            document.getElementById("Login1").style.display="block";
                            document.getElementById("login1").type = 'submit';

                        }

                    }
                }

            </script>
        </div>

    </div>
</div>
