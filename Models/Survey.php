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

    public function getSurvey($id) {
        $array = array();

        $sql = "SELECT * FROM surveys WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array['survey'] = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    
        return $array;
     
    }

    public function updateSurvey($id, $data) {
        $array = array();
        $array = $this->getSurvey($id);

        $toChange = array();

        if(!empty($data["title"])) {
            $toChange["title"] = $data["title"];
        }
        if(!empty($data["description"])){
            $toChange["description"] = $data["description"];
        }
        
        if(!empty($data["start_date"])) {
            $toChange["start_date"] = $data["start_date"];
        }

        if(!empty($data["end_date"])) {
            $toChange["end_date"] = $data["end_date"];
        }

        if(count($toChange) > 0) {

           

            $fields = array();
            foreach ($toChange as $key => $value) {
                $fields[] = $key . " = :" . $key; 
            }

            $sql = "UPDATE surveys SET " . implode(",", $fields) . " WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);

            foreach ($toChange as $key => $value) {
                $sql->bindValue(":" . $key, $value);
            }

            $sql->execute();

            return true;

        } else {
            return "Preencha os dados corretamente!";
        }
    }

    public function deleteSurvey($id) {
        $array = array();
        $array = $this->getSurvey($id);

        //delete all survey options before delete survey
        $dish = new SurveyOptions();
        $dish->deleteSurveyOptionsIfSurveyDeleted($id);

        $sql = "DELETE FROM surveys WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return "Survey deleted!";
    }
}
