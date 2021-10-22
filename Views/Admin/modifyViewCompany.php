<?php
require_once (VIEWS_PATH."nav.php");
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>
<body class="grey darken-3">
<div class="row grey darken-3 ">
<div class="collection grey darken-3 col s6   ">
    <a href="#modal3" data-target="modal3" class="collection-item btn modal-trigger"><?=$company->getNameCompany();?>  </a>
    <a href="#!" class="collection-item "><?=$company->getCity();?></a>
    <a href="#!" class="collection-item"><?=$company->getAddress()?></a>
    <a href="#!" class="collection-item"><?=$company->getSize();?></a>
    <a href="#!" class="collection-item"><?=$company->getEmail();?></a>
    <a href="#!" class="collection-item"><?=$company->getPhoneNumber();?></a>
    <a href="#!" class="collection-item"><?=$company->getCuit();?></a>
    <a href="<?=FRONT_ROOT."Admin/showListCompany"?>" class="left align waves-effect waves-light btn black">Volver</a>
    <a href="<?=FRONT_ROOT."Admin/deleteCompany?varId=$id"?>" class="right align waves-effect waves-light btn black">Borrar</a>
</div>
</div>
<div id="modal3" class="modal">
    <div class="modal-content">
        <form action="<?=FRONT_ROOT."Admin/showListCompany"?>"> <label for="">Nombre Nuevo</label>
            <input type="text" name="name">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Volver</a>
         <button type="submit">enviar</button>
        </form>
    </div>


</div>
</body>
