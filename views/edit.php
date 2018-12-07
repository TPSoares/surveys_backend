<form method="POST">
    <div class="form-group">
        <label>Titulo:</label>
        <input type="text" name="titulo" class="form-control" value="<?php echo $info["titulo"] ?>" />
    </div>
    <div class="form-group">
        <label>Descrição:</label>
        <textarea type="text" name="descricao" class="form-control"><?php echo $info["descricao"] ?></textarea>
    </div>
    <div class="form-group">
        <label>Prioridade:</label>
        <input type="number" name="prioridade" min="1" class="form-control" value="<?php echo $info["prioridade"] ?>" />
    </div>

    <input type="submit" value="Criar tarefa" class="btn btn-primary" />
</form>