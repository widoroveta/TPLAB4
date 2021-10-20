<?php

namespace DAO;

abstract class  DAO
{
    public function __construct()
    {
    }
    protected static $instance = null;
    public abstract static function getInstance();
    public  function add(){

    }
    public function delete(){

    }
    public function saveData(){

    }



}
?>



<!-- clase abstract con metodo getinstance -->
<!--metodos abstractos todos los daos extends de esta clase  -->