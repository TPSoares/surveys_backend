<?php
    class homeController extends controller {
        public function index() {

            $data = array(
            
            );

            $this->loadTemplate("home", $data);

        }
    }
?>