<?php
    global $routes;
    $routes = array();

    //personalized routes
    $routes["/teste"] = "/home/testando"; 
    $routes["/surveys/new"] = "/survey/addSurvey"; 
    $routes["/surveys"] = "/survey/getAllSurveys"; 
    $routes["/surveys/{id}"] = "/survey/surveyMethods/:id"; 
    $routes["/surveys/edit/{id}"] = "/survey/edit/:id"; 

    $routes["/survey_options/{id}"] = "/surveyoptions/addSurveyVote/:id"; 