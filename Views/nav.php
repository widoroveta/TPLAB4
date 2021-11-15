<?php
require_once(VIEWS_PATH . "header.php");
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    $(document).ready(function () {
        $('#modal1').modal('toggle')
    });
    // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
    // var collapsibleElem = document.querySelector('.collapsible');
    // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

    // Or with jQuery

    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>

<ul id="slide-out" class="sidenav grey darken-1">


    <?php
    if (isset($_SESSION['loggedUser'])) {
        $userLogged = $_SESSION['loggedUser'];
    }
    if (!isset($userLogged)) {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems);
            });

        </script>
    <br>
        <!-- Botones sin session -->
        <ul class="center-align  ">
            <!-- Registrarse -->
            <li><a class="waves-effect waves-light btn modal-trigger pink-text text-accent-3 black" href="#modal1">Registrarse</i></a>
            </li>
            <!-- Loguearse -->
            <li><a class="waves-effect waves-light btn  modal-trigger pink-text text-accent-3 black" href="#modal2" ?>Iniciar
                    sesion</i></a></li>

        </ul>


    <?php
    } else {
    if ($userLogged != 'admin'){
    ?>

        <div class='user-view '>

            <span class="background "><img src="https://wallpapercave.com/wp/wp2607892.jpg" alt=""></span>
            <span class="name  grey-text text-lighten-5"><strong><h4><?= $userLogged->getFirstName(); ?> <?= $userLogged->getLastName(); ?></h4></strong></span>
            <span class="Email grey-text text-lighten-5"><strong><h6><?= $userLogged->getEmail(); ?></h6></strong></span>

            <span class="caree grey-text text-lighten-5"><strong>Carrera: <?= $userLogged->getCareer()->getDescription(); ?></strong></span>
            <br>
            <span class="caree grey-text text-lighten-5"><strong>Genero: <?= $userLogged->getGender(); ?></strong></span>
            <br>
            <span class="dn grey-text text-lighten-5"><strong>DNI: <?= "******" . substr($userLogged->getDni(), 7, 10) ?></strong></span>
            <br>
            <span class="Email grey-text text-lighten-5"><strong><?= $userLogged->getPhoneNumber(); ?></strong></span>

        </div>
        <?php
    }
        ?>
    <br>
        <ul class="center-align">
            <li><a class="waves-effect waves-light btn modal-trigger pink-text text-accent-3 black"
                   href="<?= FRONT_ROOT . "Home/logout" ?>">cerrar sesion</i></a></li>
        </ul>


        <?php
    }

    ?>
</ul>
<div class="left-align  grey darken-4 ">
    <a href="#" data-target="slide-out" class="sidenav-trigger "><i
                class="small  material-icons blue-grey-text text-lighten-5 ">menu</i></a>
</div>


<div id="modal2" class="modal">
    <form action="<?= FRONT_ROOT . "home/login" ?>" method="POST">
    <div class="modal-content ">
                    <div class="input-field col s6">
                <input id="email" name="email" type="text" class="validate" required>
                <label for="email">Nombre de Usuario</label>
            </div>
            <div class="input-field col s6">
                <input id="password" name="password" type="password" class="validate" required>
                <label for="password">Contraseña</label>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Iniciar sesion</button>
    </div>
    </form>
</div>


<!-- Ventana de registro -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row">

            <div id="msg"></div>


            <div id="error" style="display: none;" class="card-panel   red" role="alert">
                Las Contraseñas no coinciden, vuelve a intentar !
            </div>
            <div id="ok" style="display: none;" class="card-panel  green" role="alert">
                Las Contraseñas coinciden
            </div>

            <form action="<?=FRONT_ROOT."home/register"?>" method="post" id="miformulario">
                <div class="form-group">
                    <label for="usuario">Email</label>
                    <input type="text" value="" placeholder="Example@gmail.com" name="email" class="form-control" id="Email">
                </div>
                <div class="form-group">
                    <label for="pass1">Contraseña</label>
                    <input type="password" value="" placeholder="123456" onchange="verificarPasswords(); return false" class="form-control" id="pass1"
                           required>
                </div>
                <div class="form-group">
                    <label for="pass2">Vuelve a escribir la Contraseña</label>
                    <input type="password" name="pass2" placeholder="123456" value="" onchange="verificarPasswords(); return false" class="form-control" id="pass2"
                           required>
                </div>

                <button type="submit" id="login" class="btn btn-primary">Registrarse</button>
            </form>

            <script>
                function verificarPasswords() {

                    // Ontenemos los valores de los campos de contraseñas
                    pass1 = document.getElementById('pass1');
                    pass2 = document.getElementById('pass2');
                    if (Boolean(pass2)) {
                        if (pass1.value != pass2.value) {
                            document.getElementById("error").style.display = "block";
                            document.getElementById("ok").style.display = 'none';
                            document.getElementById("Login").style.display='none';


                        } else {
                            document.getElementById("error").style.display = "none";
                            document.getElementById("ok").style.display = 'block';
                            document.getElementById("Login").style.display="block";
                            document.getElementById("login").type = 'submit';

                        }

                    }
                }

            </script>
        </div>
    </div>


</div>
