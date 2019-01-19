<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    //All websites can access the API's endpoints (for now)
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");

    require "vendor/autoload.php";
    require "config.php";
    require "routers.php";

    // spl_autoload_register(function($class) {
        
    //     if(file_exists("controllers/" . $class . ".php")) {
    //         require "controllers/" . $class . ".php";
    //     } else if (file_exists("models/" . $class . ".php")) {
    //         require "models/" . $class . ".php";
    //     } else if (file_exists("core/" . $class . ".php")) {
    //         require "core/" . $class . ".php";
    //     }
    // });

    $core = new Core\Core();
    $core->run();
?>