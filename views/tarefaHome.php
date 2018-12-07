<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Prioridade</th>
        <th>Ações</th>
    </tr>
</thead>
    <?php
        foreach($tarefas as $tarefa) {
    ?>
    <tbody>
        <tr>
            <td><?php echo $tarefa["id"] ?></td>
            <td><?php echo $tarefa["titulo"] ?></td>
            <td><?php echo $tarefa["descricao"] ?></td>
            <td><?php echo $tarefa["prioridade"] ?></td>
            <td>
                <a class="btn btn-warning" href="<?php echo BASE_URL; ?>tarefas/edit/<?php echo $tarefa{"id"} ?>">EDITAR</a>
                <a class="btn btn-danger" href="<?php echo BASE_URL; ?>tarefas/delete/<?php echo $tarefa{"id"} ?>">EXCLUIR</a> 
            </td>
        </tr>
    </tbody>
    <?php
        }
    ?>
</table>

<a class="btn btn-primary" href="<?php echo BASE_URL; ?>tarefas/create/">ADICIONAR TAREFA</a>
