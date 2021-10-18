<?php

require_once("header.php");
require("nav.php");
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

  ?>

</body>