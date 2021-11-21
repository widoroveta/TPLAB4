<?php

namespace Controllers;

class ImageController
{
    public function showImage($controller,$route){
        require_once (VIEWS_PATH.'actions/img-viewer.php');
    }

}