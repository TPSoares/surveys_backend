<?php

namespace Models;

use \Core\Model;

class SurveyOptions extends Model {

    public function createVote($id) {

        $sql = "UPDATE survey_options SET votes = votes + 1 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = "SELECT * FROM survey_options WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        $survey_id = $array[0]['survey_id'];

        $sql = "SELECT * FROM surveys WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $survey_id);
        $sql->execute();
    
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

    
        $array[0]['survey_options'] = $this->getSurveyOptions($survey_id);
        $array[0]['start_date'] = str_replace('-', '/', date("d-m-Y", strtotime($array[0]['start_date'])));
        $array[0]['end_date'] = str_replace('-', '/', date("d-m-Y", strtotime($array[0]['end_date'])));

        return $array;

    }
 

    public function deleteSurveyOptionsIfSurveyDeleted($id) {

        $sql = "DELETE FROM survey_options WHERE survey_id = :survey_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":survey_id", $id);
        $sql->execute();

        return "Survey options deleted!";
    }

    public function getSurveyOptions($surveyId) {
        $array = array();

        $sql = "SELECT * FROM survey_options WHERE survey_id = :survey_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":survey_id", $surveyId);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    
        return $array;
    }
}
