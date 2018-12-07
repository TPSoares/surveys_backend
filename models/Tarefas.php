<?php

class Tarefas extends model 
{

    public function readAll() {
        $array = array();
        
        $sql = "SELECT * FROM tarefas ORDER BY prioridade ASC";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function create($titulo, $descricao, $prioridade) 
    {
        $sql = "INSERT INTO tarefas (titulo, descricao, prioridade) 
                VALUES (:titulo, :descricao, :prioridade)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":prioridade", $prioridade);
        $sql->execute();
    }

    public function get($id) 
    {
        $array = array();

        $sql = "SELECT * FROM tarefas WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function edit($id, $titulo, $descricao, $prioridade) 
    {
        $sql = "UPDATE tarefas 
                SET titulo = :titulo, descricao = :descricao, prioridade = :prioridade 
                WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":prioridade", $prioridade);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM tarefas WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();   
    }
}