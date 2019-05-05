
# Surveys Back end application

A PHP Back end API to handle survey creation

You can access the surveys project at:
* [Project](http://enquetes.tpsoares.com/)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

* [Composer](https://getcomposer.org/) - Dependency Manager for PHP

### Installing

A step by step that tells you how to get a development environment running

* Clone the repository into your local machine
* Open your terminal window and go to the directory of the project and install all the projects dependencies with composer

```
composer install
```
* Config your config.php file with your host configurations

```php
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
```

* To run the API, simply start your local host
