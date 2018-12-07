<?php
    require "environment.php";

    $config = array();

    if(ENVIRONMENT == "development") {
        define("BASE_URL", "http://localhost/dot_challenge/questao4/");
        $config["dbname"] = "dot_challenge";
        $config["host"] = "localhost";
        $config["dbuser"] = "tenodar";
        $config["dbpass"] = "teste";
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