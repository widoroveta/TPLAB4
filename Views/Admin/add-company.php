<?php
require_once(VIEWS_PATH . 'Admin/nav-admin.php');
?>
<script> document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });</script>
<body class="grey darken-3">
<div class="row">
    <div class="col s4 push-s1">
        <form action="" class="">
            <label for="">Nombre de compania</label>
            <input type="text">


          <div class="input-field">
              <select name="" id="">
                  <option value="Mar Del Plata">Mar del Plata</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="Cordoba">Cordoba</option>
                  <option value="Salta">Salta</option>
                  <option value="La Plata">La Plata</option>
              </select>
              <label for="">Ciudad</label>
          </div>
            <label for=""></label>
        </form>
    </div>
</div>
</body>