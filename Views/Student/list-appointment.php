<?php
require_once (VIEWS_PATH."nav.php");
require_once (VIEWS_PATH."student/nav-student.php");
// $handler=opendir(UPLOADS_PATH);
// while (false !== ($file = readdir($handler))) {
    foreach($fileList as $file){
    ?>
<body class="grey darken-3">
<div class="row">
    <div class="col s6">
        <a href="<?=UPLOADS_PATH.$file?>>" download>
            <img src="<?=IMG_PATH?>/PDF_file_icon.svg" alt="" width="35" height="35">
            <p><?=$file->getCv();?></p>
        </a>
    </div>
</div>
<?php
}
?>

</body>