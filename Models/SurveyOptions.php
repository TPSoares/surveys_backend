<?php

namespace Models;

use \Core\Model;

class SurveyOptions extends Model {
 

    public function deleteSurveyOptionsIfSurveyDeleted($id) {

        $sql = "DELETE FROM survey_options WHERE survey_id = :survey_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":survey_id", $id);
        $sql->execute();

        return "Survey options deleted!";
    }
}
