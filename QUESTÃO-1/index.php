<?php
require 'database.php';

$livros = $db->query("SELECT * FROM livros")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <style>
        body{
            background-color: #89CFF0;
        }

        h1{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h2{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

    </style>
<head>
    <meta charset="UTF-8">
    <title>Livraria - Banco de Dados</title>
</head>
<body>

<h1>Livraria</h1>

<h2>Livros cadastrados</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
    </tr>

    <?php foreach ($livros as $livro): ?>
    <tr>
        <td><?= $livro['id'] ?></td>
        <td><?= $livro['titulo'] ?></td>
        <td><?= $livro['autor'] ?></td>
        <td><?= $livro['ano'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>

<h2>Adicionar Livro</h2>
<form action="add_book.php" method="POST">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" required><br><br>

    <label>Ano:</label><br>
    <input type="number" name="ano" required><br><br>

    <button type="submit">Adicionar</button>
</form>

<hr>

<h2>Excluir Livro</h2>
<form action="delete_book.php" method="POST">
    <label>ID do Livro:</label><br>
    <input type="number" name="id" required><br><br>
    <button type="submit">Excluir</button>
</form>

</body>
</html>
