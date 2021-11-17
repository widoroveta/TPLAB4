<?php
require_once (VIEWS_PATH."company/nav-company.php");
$companyDAO=\DAO\CompanyDAO::getInstance();
var_dump($companyDAO->searchById($_SESSION['loggedUser']->getCompany()));
?>
<body class="grey darken-3">

</body>