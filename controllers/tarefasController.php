<?php
    class tarefasController extends controller 
    {
        public function index() 
        {

            $data = array(
            
            );

            $tarefas = new Tarefas();

            $data["tarefas"] = $tarefas->readAll();

            $this->loadTemplate("tarefaHome", $data);
        }

        public function create() 
        {

            $data = array();

            $this->loadTemplate("create", $data);
        }

        public function create_add() 
        {

            if(!empty($_POST["titulo"])) {
                $titulo = $_POST["titulo"];
                $descricao = $_POST["descricao"];
                $prioridade = $_POST["prioridade"];

                $tarefas = new Tarefas();
                $tarefas->create($titulo, $descricao, $prioridade);

                header("Location: " . BASE_URL . "tarefas");
            }
        }

        public function edit($id) 
        {
            
            $data = array();
            
            if(!empty($id)) {
                $tarefas = new Tarefas();

                if(!empty($_POST["titulo"]) && $_POST["descricao"] && $_POST["prioridade"]) {
                    $titulo = $_POST["titulo"];
                    $descricao = $_POST["descricao"];
                    $prioridade = $_POST["prioridade"];

                    $tarefas->edit($id, $titulo, $descricao, $prioridade);

                } else {
                    $data["info"] = $tarefas->get($id);
    
                    if(isset($data["info"]["id"])) {
                        $this->loadTemplate("edit", $data);
                        exit;
                    }
                }
            }

            header("Location: " . BASE_URL . "tarefas");
        }

        public function delete($id) 
        {
            if(!empty($id)) {
                $tarefas = new Tarefas();
                $tarefas->delete($id);
            }

            header("Location: " . BASE_URL . "tarefas");
        }
    }
?>