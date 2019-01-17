<?php
    require "environment.php";

    $config = array();

    if(ENVIRONMENT == "development") {
        define("BASE_URL", "http://localhost/mvc_structure");
        $config["dbname"] = "dbname";
        $config["host"] = "localhost";
        $config["dbuser"] = "root";
        $config["dbpass"] = "rot";
    } else {
        define("BASE_URL", "yourbaseurl");
        $config["dbname"] = "yourdbname";
        $config["host"] = "yourhost";
        $config["dbuser"] = "yourdbuser";
        $config["dbpass"] = "yourdbpass";
    }

    global $db;

    try {
        $db = new PDO("mysql:dbname=".$config["dbname"].
                        ";host=".$config["host"], 
                        $config["dbuser"], 
                        $config["dbpass"]
                    );
    } catch (PDOException $e) {
        echo "ERRO: " . $e->getMessage();
        exit; 
    }
?>