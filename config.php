<?php
    require "environment.php";

    $config = array();

   f(ENVIRONMENT == "development") {
        define("BASE_URL", "yourbaseurl"); //ex.: http://localhost
        $config["dbname"] = "yourdbname";
        $config["host"] = "yourhost";      //ex.: localhost
        $config["dbuser"] = "yourdbuser";
        $config["dbpass"] = "yourdbpass";
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
