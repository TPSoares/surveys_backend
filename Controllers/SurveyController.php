<?php

namespace Controllers;

use \Core\Controller;
use \Models\Survey;

class SurveyController extends Controller 
{
    public function addSurvey() {
        $array = array("error" => "");

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if($method == "POST") {

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
}
