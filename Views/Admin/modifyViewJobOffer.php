<?php
require_once(VIEWS_PATH . "nav.php");

?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
<script> document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });</script>

<body class="grey darken-3">
<div class="row grey darken-3 ">
    <div class="collection grey darken-3 col s6   ">
        <a href="#modal-Company" class="collection-item btn modal-trigger"><?= $jobOffer->getCompany()->getNameCompany(); ?>  </a>
        <a href="#modal-Description" class="collection-item  btn modal-trigger "><?= $jobOffer->getJobPosition()->getDescription(); ?></a>
        <a href="#modal-requirements" class="collection-item  btn modal-trigger "><?= $jobOffer->getRequirements() ?></a>

        <a href="<?= FRONT_ROOT . "Admin/showListjobOffer" ?>" class="left align waves-effect waves-light btn black">Volver</a>
        <a href="<?= FRONT_ROOT . "Admin/deletejobOffer?varId=$id" ?>"
           class="right align waves-effect waves-light btn black">Borrar</a>
    </div>
</div>
<div id="modal-Company" class="modal" >
    <div class="modal-content" style="min-height: 200px;min-width: 400px;" >

        <form action="<?= FRONT_ROOT . "Admin/modifyCompany" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
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

            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>
<div id="modal-Description" class="modal">
    <div class="modal-content">

        <form action="<?= FRONT_ROOT . "Admin/modifyJobPosition" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
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
            <div class="modal-footer">
                <a href="#!"
                   class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
                <button type="submit" class="btn waves-effect waves-light light-blue-text text-accent-3">Enviar</button>
            </div>
        </form>
    </div>
</div>
<div id="modal-requirements" class="modal">
    <div class="modal-content">
        <label for="">Nuevo requisito</label>
        <form action="<?= FRONT_ROOT . "Admin/modifyRequirements" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <input type="text" name="requirements">

            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>


</body>