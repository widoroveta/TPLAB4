<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems);

    });

    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems);
    });
</script>
<?php
require_once(VIEWS_PATH . "company/nav-company.php")
?>
<body class="grey darken-3">
<section style="min-height: 100%">
<div class="row">
    <form action="<?= FRONT_ROOT . "companyPanel/addJobOffer" ?>" enctype="multipart/form-data" method="POST">
        <div class="card-panel col s5 push-s4" style="padding: 50px; border-radius: 5px;">

            <input type="hidden" value="<?= $id ?>" name="company">
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

            <div class="file-field input-field">
                <div class="btn red darken-4 z-depth-4">
                    <span>File</span>
                    <input name='flyer' accept="image/*" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <div class="input-field ">
                <input type="text" id="requirements" name="requirements">
                <label for="requirements">Requirimientos</label>
            </div>
            <input type="text" name="date" class="datepicker">
            <input type="text" name="time" class="timepicker">
            <!--            <script>-->
            <!--                if(document.getElementsByName('date')) {-->
            <!--                    alert(document.getElementsByName('date'));-->
            <!--                }-->
            <!--            </script>-->
            <button class="right align btn waves-effect waves-light  offset-s8 red darken-4 z-depth-4" type="submit"
                    name="action">Enviar
                <i class="material-icons right">send</i>
            </button>

        </div>
    </form>
</div>
</section>
</body>
