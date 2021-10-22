<?php
require_once(VIEWS_PATH . 'Admin/nav-admin.php');
?>
<script> document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });</script>
<body class="grey darken-3">
<div class="row">
    <div class="col s4 push-s1">
        <form action="<?= FRONT_ROOT . "CompanyMagnament/addCompany" ?>" class="">
            <label for="nameCompany">Nombre de compania</label>
            <input name="nameCompany" type="text">
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
            <label for="address">Direccion</label>
            <input type="text" name="address">
            <div class="input-field">
                <select name="size" id="">
                    <option value="small">Pequeña</option>
                    <option value="medium">Mediana</option>
                    <option value="big">Grande</option>
                </select>
                <label for="">tamaño</label>
            </div>
            <label for="email">Email</label>
            <input type="text" name="email">
            <label for="phoneNumber">Numero de Telefono</label>
            <input type="text" name="phoneNumber">
            <label for="">CUIT</label>
            <input type="text" name="CUIT">
            <button  class="right-align grey darken-3" style="border:none;" type="submit"><a class="btn-floating btn-large waves-effect waves-light indigo darken-4 "><i
                        class="material-icons">add</i></a> </button>
        </form>
    </div>
</div>
</body>