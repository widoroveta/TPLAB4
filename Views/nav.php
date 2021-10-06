<script>
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

<ul id="slide-out" class="sidenav">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="images/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div>
  </li>
  <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
  <li><a href="#!">Second Link</a></li>
  <li>
    <div class="divider"></div>
  </li>
  <li><a class="subheader">Subheader</a></li>
  <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>
<div class="container section brown darken-2 ">
<a href="#" data-target="slide-out" class="sidenav-trigger "><i class="material-icons ">menu</i></a>
</div>
<nav>
  <div class="nav-wrapper  brown darken-2">
    
    <!-- Icono 
    <a href="#!" class="brand-logo"><i class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-frame" width="44" height="44" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <line x1="4" y1="7" x2="20" y2="7" />
          <line x1="4" y1="17" x2="20" y2="17" />
          <line x1="7" y1="4" x2="7" y2="20" />
          <line x1="17" y1="4" x2="17" y2="20" />
        </svg></i></a> -->


    <?php

    if (!isset($_SESSION['loggedUser'])) {
    ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });
      </script>
      <!-- Botones sin session -->
      <ul class="right hide-on-med-and-down">
        <!-- Registrarse -->
        <li><a class="waves-effect waves-light btn modal-trigger brown darken-4" href="#modal1">Registrarse</i></a></li>
        <!-- Loguearse -->
        <li><a class="waves-effect waves-light btn  modal-trigger brown darken-4" href="#modal2" ?>Iniciar sesion</i></a></li>

      </ul>

      <!-- Ventana de logueo -->
      <div id="modal2" class="modal">
        <div class="modal-content">
          <form action="<?= FRONT_ROOT . "home/login" ?>" method="POST">
            <div class="input-field col s6">
              <input id="userName" name="userName" type="text" class="validate">
              <label for="userName">Nombre de Usuario</label>
            </div>
            <div class="input-field col s6">
              <input id="password" name="password" type="password" class="validate">
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
  </div>
<?php
    } else {
?>
  <ul class="right hide-on-med-and-down">
    <li><a class="waves-effect waves-light btn modal-trigger brown darken-4" href="<?= FRONT_ROOT . "Home/logout" ?>">cerrar sesion</i></a></li>
  </ul>

<?php
    }

?>


</nav>