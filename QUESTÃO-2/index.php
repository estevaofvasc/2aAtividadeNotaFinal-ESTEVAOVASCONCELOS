<?php include 'database.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciador de Tarefas</title>
    </head>
    <body>
        <h1>Gerenciador de tarefas</h1>

        <h2>Adicionar Nova Tarefa</h2>
        <form action="add_tarefa.php" method="POST">
            <input type="text" name="descricao" placeholder="Descrição" required>
            <input type="date" name="vencimento" required>
            <button type="submit">Adicionar</button>
        </form>

        <hr>

        <h2>Tarefas Pendentes</h2>
        <ul>
            <?php
            $stmt = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY vencimento ASC");
            foreach ($stmt as $t) {
                echo "
                <li>
                    <strong>{$t['descricao']}</strong> - Vence em: {$t['vencimento']}
                    <form action='update_tarefa.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='{$t['id']}'>
                        <button type='submit'>Concluir</button>
                    </form>
                    <form action='delete_tarefa.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='{$t['id']}'>
                        <button type='submit'>Excluir</button>
                    </form>
                </li>
                 ";
            }
            ?>
        </ul>
    </body>
</html>