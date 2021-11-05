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
<div class="row">
<form action="<?=FRONT_ROOT."admin/addJobOffer"?>" method="post">
    <div class="card-panel col s5 push-s4" style="padding: 50px">
        <div class="input-field ">
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
        <div class="input-field ">
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

            <div class="input-field ">
                <input type="text" id="requirements" name="requirements"  >
                <label for="requirements">Requirimientos</label>
            </div>

        <button class="right align btn waves-effect waves-light  offset-s8 red darken-4 z-depth-4" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>

    </div>
</form>
</div>
</body>
