<?php
require_once(VIEWS_PATH . "nav.php");
//require_once(VIEWS_PATH . "student/nav-student.php");
//var_dump($_FILES);
//echo '<pre>';
//var_dump($_POST);
//echo  '</pre>';
//var_dump($_FILES);

?>

<body class="grey darken-3">
<section style="min-height: 100%">
<div class="row">


    <form action="<?=FRONT_ROOT.'StudentMagnament/addAppointment'?>" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="jobOfferId" value="<?=$id?>">
        <input type="hidden" name="studentId" value="<?=$studentId?>">
        <div class="row">

            <div class=" card-panel  black col s4" style="padding: 20px;">
                 <span class="card-panel pink white-text col s5 push-s1">
                Mensaje de postulacion
            </span>
                <div class="input-field col s12">
                    <i class="material-icons prefix pink-text">mode_edit</i>
                    <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text" required></textarea>
                    <label for="icon_prefix2">Enviar un mensaje</label>
                </div>
                <span class="card-panel pink white-text col s5 push-s1">
                Agregar curriculum vitae
                </span>
                <div class="file-field input-field col s12 ">
                    <div class="btn pink">
                        <span>File</span>
                        <input name="file" class="form-control-file" type="file" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate white-text" type="text">
                    </div>
                </div>
                <a href="<?=FRONT_ROOT.'studentMagnament/showJobOfferList'?>" class="left align btn waves-effect waves-light pink">Volver</a>
                <button type="submit" class="right align btn waves-effect waves-light pink">Enviar</button>
            </div>

        </div>

    </form>
</div>
</section>

</body>
