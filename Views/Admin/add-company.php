<?php
require_once(VIEWS_PATH . 'Admin/nav-admin.php');
?>
<script> document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });</script>
<body class="grey darken-3">
<div class="row">
    <div class="card-panel z-depth-4 col s5  push-s1 white " style="padding: 25px">
        <form action="<?= FRONT_ROOT . "CompanyMagnament/addCompany" ?>" class="">
            <label for="nameCompany">Nombre de compania</label>
            <input name="nameCompany" type="text" required>
            <div class="input-field">
                <select name="city" id="" required>
                    <option value="Mar Del Plata">Mar del Plata</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Cordoba">Cordoba</option>
                    <option value="Salta">Salta</option>
                    <option value="La Plata">La Plata</option>
                </select>
                <label for="city">Ciudad</label>
            </div>
            <label for="address">Direccion</label>
            <input type="text" name="address" required>
            <div class="input-field">
                <select name="size" id="" required>
                    <option value="small">Pequeña</option>
                    <option value="medium">Mediana</option>
                    <option value="big">Grande</option>
                </select>
                <label for="">tamaño</label>
            </div>
            <label for="email">Email</label>
            <input type="text" name="email" required>
            <label for="phoneNumber">Numero de Telefono</label>
            <input type="text" name="phoneNumber" required>
            <label for="">CUIT</label>
            <input type="text" name="CUIT" required>
            <button  class="right-align white " style="border:none;" type="submit"><a class="btn-floating btn-large waves-effect waves-light indigo darken-4 "><i
                        class="material-icons">add</i></a> </button>
        </form>
    </div>
</div>
</body>