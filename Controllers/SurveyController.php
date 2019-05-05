<?php

namespace Controllers;

use \Core\Controller;
use \Models\Survey;
use \Models\SurveyOptions;

class SurveyController extends Controller 
{
    public function addSurvey() {
        $array = array("error" => "");

        $method = $this->getMethod();
        $data = $this->getRequestData();

        
        if($method == "POST") {

            //separate all survey options
            $surveyOptions = explode(",", $data['survey_options']);

            if(count($surveyOptions) < 3) {
                http_response_code(500);
                $array["error"] = "Você deve colocar pelo menos 3 opções de resposta!";
                $this->returnJson($array);
            }

            if(!empty($data["title"]) && !empty($data["start_date"]) && !empty($data['end_date'])) {

                $title = $data['title'];
                $description = $data['description'];
                $start_date = $data['start_date'];
                $end_date = $data['end_date'];

                $survey = new Survey();

                try {
                    $survey->addSurvey($title, $description, $start_date, $end_date, $surveyOptions);

                } catch (\Exception $e) {
                    $array['error'] = $e->getMessage();
                }

            } else {
                http_response_code(500);
                $array["error"] = "Preencha todos os campos!";
            }
        } else {
            http_response_code(500);
            $array["error"] = "Método de requisição incompatível!";
        }

        $this->returnJson($array);

    }

    public function surveyMethods($id) {
        $array = array("error" => "");
        $method = $this->getMethod();
        $data = $this->getRequestData();


        switch($method) {
            case "GET":
                $survey = new Survey();
                $array["data"] = $survey->getSurvey($id);

                break;

            case "PUT":
    
                $survey = new Survey();
                $array['data'] = $survey->updateSurvey($id, $data);
                
                break;

            case "POST":
                $survey = new Survey();
                $array['data'] = $survey->deleteSurvey($id);

                break;
            default:
                http_response_code(500);
                $array["error"] = "Método não disponível!";
                break;
        }

        $this->returnJson($array);
    }

    public function edit($id) {
        $array = array("error" => "");
        $method = $this->getMethod();
        $data = $this->getRequestData();


        switch($method) {
            
            case "POST":
    
                if(!empty($data["title"]) && !empty($data["start_date"]) && !empty($data['end_date'])) {

                    $survey = new Survey();
                    $array['data'] = $survey->updateSurvey($id, $data);
         
                } else {
                    http_response_code(500);
                    $array["error"] = "Preencha todos os campos!";
                }
                
                break;

            default:
                http_response_code(500);
                $array["error"] = "Método não disponível!";
                break;
        }

        $this->returnJson($array);
    }

    public function getAllSurveys() {
        $array = array("error" => "");
        $method = $this->getMethod();
     
        if($method == "GET") {
            $surveys = new Survey();
            $surveyOptions = new SurveyOptions();
            $array['data'] = $surveys->getAllSurveys();

            // foreach ($array['data']['surveys'] as $survey) {
            //     $array['data']['surveys']['survey_options'] = $surveyOptions->getSurveyOptions($survey['id']);
            // }
        } else {
            http_response_code(500);
            $array["error"] = "Método de requisição incompatível!";
        }

        $this->returnJson($array);
    }
}
