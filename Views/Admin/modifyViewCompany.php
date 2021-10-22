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
        <a href="#modal-name" class="collection-item btn modal-trigger"><?= $company->getNameCompany(); ?>  </a>
        <a href="#modal-city" class="collection-item  btn modal-trigger "><?= $company->getCity(); ?></a>
        <a href="#modal-address" class="collection-item btn modal-trigger"><?= $company->getAddress() ?></a>
        <a href="#modal-size" class="collection-item btn modal-trigger"><?= $company->getSize(); ?></a>
        <a href="#modal-email" class="collection-item btn modal-trigger"><?= $company->getEmail(); ?></a>
        <a href="#modal-phoneNumber" class="collection-item btn modal-trigger"><?= $company->getPhoneNumber(); ?></a>
        <a href="#modal-cuit" class="collection-item btn modal-trigger"><?= $company->getCuit(); ?></a>
        <a href="<?= FRONT_ROOT . "Admin/showListCompany" ?>" class="left align waves-effect waves-light btn black">Volver</a>
        <a href="<?= FRONT_ROOT . "Admin/deleteCompany?varId=$id" ?>"
           class="right align waves-effect waves-light btn black">Borrar</a>
    </div>
</div>
<div id="modal-name" class="modal">
    <div class="modal-content">
        <label for="">Nombre Nuevo</label>
        <form action="<?= FRONT_ROOT . "Admin/modifyName" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <input type="text" name="name">

            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>
<div id="modal-city" class="modal">
    <div class="modal-content">
        <label for="">Nombre ciudad</label>
        <form action="<?= FRONT_ROOT . "Admin/modifyCity" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <div class="input-field">
                <select name="city" id="">
                    <option value="Mar Del Plata">Mar del Plata</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Cordoba">Cordoba</option>
                    <option value="Salta">Salta</option>
                    <option value="La Plata">La Plata</option>
                </select>
                <label for="city">Ciudad</label>
            </div>
            <div class="modal-footer">
                <a href="#!"
                   class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
                <button type="submit" class="btn waves-effect waves-light light-blue-text text-accent-3">Enviar</button>
            </div>
        </form>
    </div>
</div>
<div id="modal-address" class="modal">
    <div class="modal-content">
        <label for="">Direccion Nueva</label>
        <form action="<?= FRONT_ROOT . "Admin/modifyAddress" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <input type="text" name="address">

            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>
<div id="modal-size" class="modal">
    <div class="modal-content">

        <form action="<?= FRONT_ROOT . "Admin/modifySize" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">

            <div class="input-field">
                <select name="size" id="">
                    <option value="small">Pequeña</option>
                    <option value="medium">Mediana</option>
                    <option value="big">Grande</option>
                </select>
                <label for="">tamaño</label>
            </div>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>
<div id="modal-email" class="modal">
    <div class="modal-content">

        <form action="<?= FRONT_ROOT . "Admin/modifyEmail" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <label for="email">Email</label>
            <input type="text" name="email">

            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>
<div id="modal-phoneNumber" class="modal">
    <div class="modal-content">

        <form action="<?= FRONT_ROOT . "Admin/modifyPhoneNumber" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <label for="phoneNumber">Numero de Telefono</label>
            <input type="text" name="phoneNumber">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div><div id="modal-cuit" class="modal">
    <div class="modal-content">

        <form action="<?= FRONT_ROOT . "Admin/modifyCuit" ?>">
            <input type="hidden" name='$id' value="<?= $id ?>">
            <label for="">CUIT</label>
            <input type="text" name="CUIT">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat light-blue-text text-accent-3">Volver</a>
            <button type="submit" class="waves-effect waves-green btn-flat light-blue-text text-accent-3">enviar
            </button>
        </form>
    </div>
</div>


</body>
