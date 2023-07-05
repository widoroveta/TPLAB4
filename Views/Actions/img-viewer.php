<?php
require_once(VIEWS_PATH . "nav.php");

?>



<body class="grey darken-3">

 <img class="card-panel hoverable" src="<?=FRONT_ROOT.$route;?>" alt="" style="min-height: 500px; min-width: 500px; max-height: 500px; margin:40px;">

 <br>
 <a href="<?= FRONT_ROOT . $controller . '/showListJobOffer' ?>" class="btn-floating btn-large waves-effect waves-light red">
  <i class="material-icons">keyboard_backspace</i>
 </a>
</body>