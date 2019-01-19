<?php
    namespace Controllers;

    use \Core\Controller; 

    class HomeController extends Controller 
    {
        public function index() 
        {
            // echo "MÉTODO: " . $this->getMethod() . "\n";
            // print_r($this->getRequestData());

            $array = array(
                "nome" => "Thiago Pina",
                "idade" => 25
            );

            $this->returnJson($array);
        }

        public function testando() {
            echo "Funcionou!!!";
        }

        public function getUser($id) {
            echo "ID: " . $id;
        }
    }
?>