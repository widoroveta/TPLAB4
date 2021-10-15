<?php
require_once(VIEWS_PATH . "header.php");
require_once(VIEWS_PATH . 'nav.php');

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
?>
<!-- <script>
  swal({
      text:"Usuario no registrado",
      icon:"error",
      color:"#21130d"
     
      });
</script> -->

<body class="grey darken-3">
  <!-- <script>   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
  var instance = M.Carousel.init({
    fullWidth: true
  });

  // Or with jQuery

</script>
<div class="row">
      <div class="col s12">
     
  <div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="https://t2.ea.ltmcdn.com/es/images/1/6/2/img_10_curiosidades_del_golden_retriever_21261_600.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
  </div>
      </div>
      <div class="col s6">6-columns (one-half)</div>
      <div class="col s6">6-columns (one-half)</div>
    </div>
     -->
  <?php
         $n=new StudentDAO();
         $n->getAll();
         var_dump($n);
        ?>
  <?php
  if (!empty($message)) { ?>
    <script>
      var toastHTML = '<span><?= $message ?></span>';
      M.toast({
        html: toastHTML,
        classes: " red accent-4",
        displayLength: 5000
      });
    </script>
  <?php
  }

  ?>

</body>