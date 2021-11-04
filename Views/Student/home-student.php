<?php

require_once(VIEWS_PATH."header.php");
require_once(VIEWS_PATH."nav.php");
require_once (VIEWS_PATH."Student/nav-student.php");
?>

<body class="grey darken-3">
<?php
if (!empty($message)) { ?>
    <script>
        var toastHTML = '<span><i class="tiny material-icons"> check</i><?= $message ?></span>';
        M.toast({
            html: toastHTML,
            classes: "green accent-3",
            displayLength: 5000
        });
    </script>
    <?php
}

?>    <br >
<div class="row">

<div class=" col s6 push-s3">
    <div class="card-panel col s4">
  <p >     Bievenido <?= $student->getFirstName();?> explota tus conocimiento postulandote a un trabajo hoy.
  <br> Exitos en tu busqueda.
  </p>
    </div>
    <img  class="col s2" src="https://www.megaidea.net/wp-content/uploads/2020/08/flecha-2-150x150.png"    alt="">
    <div class="card-panel col s6"><p>Las funcionalidades de la pagina estaran dadas en la barra de navegacion que tienes en la parte superior. </p> </div>
</div>
</div>

</body>