<?php

namespace DAO;

abstract class  DAO
{
    public function __construct()
    {
    }
    protected static $instance = null;
    public abstract static function getInstance();
}
?>



<!-- clase abstract con metodo getinstance -->
<!--metodos abstractos todos los daos extends de esta clase  -->