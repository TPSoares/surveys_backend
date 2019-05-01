<?php

namespace Models;

use \Core\Model;
use \Models\SurveyOptions;

class Survey extends Model {
   
    public function addSurvey($title, $description, $start_date, $end_date, $surveyOptions) {

        $sql = "INSERT INTO surveys 
            (title, description, start_date, end_date) 
            VALUES 
            (:title, :description, :start_date, :end_date)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":title", $title);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":start_date", $start_date);
        $sql->bindValue(":end_date", $end_date);
        $sql->execute();

        $lastSurvey = $this->db->lastInsertId();
        // $surveyOptions = new SurveyOptions();

        foreach ($surveyOptions as $option) {
            $sql = "INSERT INTO survey_options
                (option_title, survey_id, votes)
                VALUES
                (:option_title, :survey_id, :votes)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":option_title", $option);
            $sql->bindValue(":survey_id", $lastSurvey);
            $sql->bindValue(":votes", 0);
            $sql->execute();
            
        }
        

    }
 
}
