<?php
    global $routes;
    $routes = array();

    $routes["/teste"] = "/home/testando"; 
    $routes["/surveys/new"] = "/survey/addSurvey/:id"; 
    $routes["/surveys/{id}"] = "/survey/surveyMethods/:id"; 