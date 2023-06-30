<?php

require_once(VIEWS_PATH . "header.php");
//require_once(VIEWS_PATH."nav.php");
require_once(VIEWS_PATH . "Student/nav-student.php");
?>

<body class="grey darken-3">
    <section style="min-height: 100%">
        <?php
        if (!empty($message)) { ?>
            <script>
                var toastHTML = '<span><i class="tiny material-icons"> check</i><?= $message ?></span>';
                M.toast({
                    html: toastHTML,
                    classes: "green accent-3",
                    displayLength: 5000
                });
            </script>
        <?php
        }

        ?> <br>
        <div class="row ">

          
            <img class="col s3" style="height: 300px;" src="https://i.ytimg.com/vi/RtyvJokdUpM/maxresdefault.jpg" alt="">
            <img class="col s3" style="height: 300px;" src="https://weremote.net/wp-content/uploads/2022/08/programador-concentrado-ordenador-oficina.jpg" alt="">
            <img class="col s3" style="height: 300px;" src="https://www.lt9.com.ar/uploads/s_0c858569d498452ff7c80c.jpg" alt="">
            <img class="col s3" style="height: 300px;" src="https://www.aprender21.com/images/colaboradores/asistente-administrativo.jpg" alt="">
            <!-- </div> -->
        </div>
        <div class="row">
            <div class="card push-s4 col s4"><?= 'Que tal '. $student->getStudent()->getFirstName().'!. ¡Bienvenidos a nuestra comunidad estudiantil en busca de empleo! Juntos, alcanzaremos nuevas metas y oportunidades profesionales. #EstudiantesEnBuscaDeEmpleo' ?></div>
        </div>
        <div class="row ">
            <!-- $student->getStudent()->getFirstName(); ?> explota tus conocimiento postulandote a un trabajo hoy. -->

            <img class="col s3" style="height: 300px;" src="https://www.apply.eduhk.hk/ug/sites/default/files/2021-09/Bachelor-of-Science-%28Hons%29-in-Integrated-Environmental-Management.jpg" alt="">
            <img class="col s3" style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY6pBe7tj0I-wrcEXGZ-QbHpoReFEj56W9EA&usqp=CAU" alt="">
            <img class="col s3" style="height: 300px;" src="https://i0.wp.com/schweitzer.edu.ar/wp-content/uploads/2018/06/Visita_UTN_Puerto_Secundario_Avellaneda_Schweitzer-38.jpg?resize=525%2C394" alt="">
            <img class="col s3" style="height: 300px;" src="https://agenciadeaprendizaje.bue.edu.ar/wp-content/uploads/2021/04/Iniciacion-a-la-programacion.jpg" alt="">
            <!-- </div> -->
        </div>
    </section>
</body>