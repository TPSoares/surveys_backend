<?php

namespace Controllers;

use \Core\Controller;
use \Models\Survey;
use \Models\SurveyOptions;

class SurveyOptionsController extends Controller 
{
    public function addSurvey($id) {
        $array = array("error" => "");

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if($method == "POST") {

            $survey_options = new SurveyOptions();

            try {
                $array['data'] = $survey_options->createVote($id);

            } catch (\Exception $e) {
                $array['error'] = $e->getMessage();
            }

        } else {
            http_response_code(500);
            $array["error"] = "Método de requisição incompatível!";
        }

        $this->returnJson($array);

    }

}
