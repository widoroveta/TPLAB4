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
<div class="row">
    <form action="<?=FRONT_ROOT.'StudentMagnament/addAppointment'?>" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="jobOfferId" value="<?=$id?>">
        <input type="hidden" name="studentId" value="<?=$studentId?>">
        <div class="row">
            <div class="col s4">
                <div class="input-field col s12">
                    <i class="material-icons prefix pink-text">mode_edit</i>
                    <textarea id="icon_prefix2" name="message" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Enviar un mensaje</label>
                </div>
                <div class="file-field input-field col s12 ">
                    <div class="btn pink">
                        <span>File</span>
                        <input name="file" class="form-control-file" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button type="submit" class="right align btn waves-effect waves-light pink">Enviar</button>
            </div>
        </div>

    </form>
</div>

</body>
