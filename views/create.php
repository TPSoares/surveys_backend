<form method="POST" action="<?php echo BASE_URL; ?>tarefas/create_add">
    <div class="form-group">
        <label>Titulo:</label>
        <input type="text" name="titulo" class="form-control" />
    </div>
    <div class="form-group">
        <label>Descrição:</label>
        <textarea type="text" name="descricao" class="form-control" ></textarea>
    </div>
    <div class="form-group">
        <label>Prioridade:</label>
        <input type="number" name="prioridade" min="1" class="form-control" />
    </div>

    <input type="submit" value="Criar tarefa" class="btn btn-primary" />
</form>