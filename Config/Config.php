<?php 
    namespace Config;

    //ROOT
    define("ROOT", dirname(__DIR__) . "/");
    define("FRONT_ROOT", "/TPFinal/");
    
    //VIEWS
    define("VIEWS_PATH", "Views/");
    define("IMG_PATH", FRONT_ROOT.VIEWS_PATH."assets/img/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH."assets/js/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH."assets/css/");
    //API
    define("API_HOST","https://utn-students-api.herokuapp.com/api");
    define("HTTP_PROTOCOL","x-api-key:4f3bceed-50ba-4461-a910-518598664c08")

   ?>