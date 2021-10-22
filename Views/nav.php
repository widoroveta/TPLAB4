<?php
require_once(VIEWS_PATH."header.php");
?><script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function() {
    $('.sidenav').sidenav();
  });
</script>

<ul id="slide-out" class="sidenav grey darken-1">


  <?php
if(isset($_SESSION['loggedUser'])) {
    $userLogged = $_SESSION['loggedUser'];
}
  if (!isset($userLogged)) {
  ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      });
    </script>
    <br>
    <!-- Botones sin session -->
    <ul class="center-align  ">
      <!-- Registrarse -->
      <li><a class="waves-effect waves-light btn modal-trigger pink-text text-accent-3 black" href="#modal1">Registrarse</i></a></li>
      <!-- Loguearse -->
      <li><a class="waves-effect waves-light btn  modal-trigger pink-text text-accent-3 black" href="#modal2" ?>Iniciar sesion</i></a></li>

    </ul>


  <?php
  } else { if($userLogged!='admin'){
  ?>
 
    <div class='user-view '>
    <span class="background "><img src="https://wallpapercave.com/wp/wp2607892.jpg" alt=""></span>
      <span class="name  grey-text text-lighten-5"><strong><h4><?= $userLogged->getFirstName(); ?> <?= $userLogged->getLastName(); ?></h4></strong></span>
      <span class="Email grey-text text-lighten-5"><strong><h6><?= $userLogged->getEmail(); ?></h6></strong></span>

      <span class="caree grey-text text-lighten-5"><strong>Carrera: <?= $userLogged->getCareer()->getDescription(); ?></strong></span>
      <br>
      <span class="dn grey-text text-lighten-5"><strong>DNI: <?= "******".substr($userLogged->getDni(),7,10) ?></strong></span>
      <br>
      <span class="Email grey-text text-lighten-5"><strong><?= $userLogged->getPhoneNumber(); ?></strong></span>

    </div>
  <?php
  }
  ?>
    <br>
    <ul class="center-align">
      <li><a class="waves-effect waves-light btn modal-trigger pink-text text-accent-3 black" href="<?= FRONT_ROOT . "Home/logout" ?>">cerrar sesion</i></a></li>
    </ul>


  <?php
  }

  ?>
</ul>
<div class="left-align  grey darken-4 ">
  <a href="#" data-target="slide-out" class="sidenav-trigger "><i class="small  material-icons blue-grey-text text-lighten-5 ">menu</i></a>
</div>


<div id="modal2" class="modal">
  <div class="modal-content ">
    <form action="<?= FRONT_ROOT . "StudentMagnament/login" ?>" method="POST">
      <div class="input-field col s6">
        <input id="email" name="email" type="text" class="validate">
        <label for="email">Nombre de Usuario</label>
      </div>
      <div class="input-field col s6">
        <input id="password" name="password" type="password" class="validate">
        <label for="password">Contraseña</label>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="modal-close waves-effect waves-green btn-flat">Iniciar sesion</button>
      </form>
  </div>

</div>

<!-- Ventana de registro -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <!-- <div class="row">
    <div class="input-field col s12">
      <input disabled value="I am not editable" id="disabled" type="text" class="validate">
      <label for="disabled">Disabled</label>
    </div>
  </div> -->
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        <!-- <div class="row">
    <div class="col s12">
      This is an inline input field:
      <div class="input-field inline">
        <input id="email_inline" type="email" class="validate">
        <label for="email_inline">Email</label>
        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
      </div>
    </div>
  </div> -->
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
