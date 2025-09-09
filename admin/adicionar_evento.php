<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Evento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar Novo Evento</h2>
        <a href="dashboard.php" class="btn btn-voltar" style="margin-bottom: 20px;"><< Voltar</a>
        <hr>
        <form action="salvar_evento.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="form-group">
                <label>Data:</label>
                <input type="date" name="data_evento" required>
            </div>
            <div class="form-group">
                <label>Horário:</label>
                <input type="text" name="horario">
            </div>
            <div class="form-group">
                <label>Local:</label>
                <input type="text" name="local">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Imagem do Evento:</label>
                <input type="file" name="imagem" accept="image/*">
            </div>
            <button type="submit" class="btn btn-adicionar">Salvar Evento</button>
        </form>
    </div>
</body>
</html>