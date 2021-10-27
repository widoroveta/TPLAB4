<?php
require_once(VIEWS_PATH . "nav.php");
require_once(VIEWS_PATH . "Admin/nav-admin.php");
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
<?php

?>
<body class="grey darken-3">
<form action="<?=FRONT_ROOT."admin/addJobOffer"?>" method="post">
    <div class="row">
        <div class="input-field col s5 offset-s4">
            <select name="company">
                <option value="" disabled selected>Seleccione una</option>
                <?php
                foreach ($companyList as $company) {
                    ?>
                    <option value="<?= $company->getCompanyId() ?>"><?= $company->getNameCompany() ?></option>
                    <?php
                }
                ?>
            </select>
            <label>Empresas</label>
        </div>
        <div class="input-field col s5 offset-s4">
            <select name="jobPosition">
                <option value="" disabled selected>Seleccione una</option>
                <?php
                foreach ($jobPositionList as $jobPosition) {
                    ?>
                    <option value="<?= $jobPosition->getJobPositionId() ?>"><?= $jobPosition->getDescription() ?></option>
                    <?php
                }
                ?>
            </select>
            <label>Posiciones de Trabajo</label>
        </div>

        <button class="btn waves-effect waves-light col s1 offset-s8 red darken-4 z-depth-4" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>
    </div>

</form>
</body>
