<?php
require_once(VIEWS_PATH . "header.php");
require_once(VIEWS_PATH . 'nav.php');

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use DAO\CareerDAO as CareerDAO;
?>


<body class="grey darken-3">
 


  <?php
        
        
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