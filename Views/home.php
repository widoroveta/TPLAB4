<?php
require_once(VIEWS_PATH . "header.php");
require_once(VIEWS_PATH . 'nav.php');

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use DAO\CareerDAO as CareerDAO;
use DAO\JobPositionDAO as JobPositionDAO;
?>


<body class="grey darken-3">
<img src="https://mdp.utn.edu.ar/wp-content/uploads/2021/02/UTN_IsoLogoBcoNeg.png" alt="">


  
        
<?php
$jobPosition=new JobPositionDAO();
echo '<pre>';
var_dump($jobPosition->getAll());
echo '</pre>';

?>
        
        
       
  <?php
  if (!empty($message)) { ?>
    <script>
      var toastHTML = '<span><i class="tiny material-icons">close</i>  <?= $message ?></span>';
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