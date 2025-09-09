<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit(); }

$id = $_GET['id'];

$json_data = file_get_contents('../eventos.json');
$eventos = json_decode($json_data, true);

$evento_para_editar = null;
foreach ($eventos as $evento) {
    if ($evento['id'] == $id) {
        $evento_para_editar = $evento;
        break;
    }
}

if (!$evento_para_editar) {
    die("Evento não encontrado para edição.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Evento</h2>
        <a href="dashboard.php" class="btn btn-voltar" style="margin-bottom: 20px;"><< Voltar</a>
        <hr>
        <form action="atualizar_evento.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $evento_para_editar['id']; ?>">
            
            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="titulo" value="<?php echo htmlspecialchars($evento_para_editar['titulo']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Data:</label>
                <input type="date" name="data_evento" value="<?php echo htmlspecialchars($evento_para_editar['data_evento']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Horário:</label>
                <input type="text" name="horario" value="<?php echo htmlspecialchars($evento_para_editar['horario']); ?>">
            </div>
            
            <div class="form-group">
                <label>Local:</label>
                <input type="text" name="local" value="<?php echo htmlspecialchars($evento_para_editar['local']); ?>">
            </div>
            
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao" rows="5"><?php echo htmlspecialchars($evento_para_editar['descricao']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Imagem do Evento (trocar):</label>
                <input type="file" name="imagem" accept="image/*"><br>
                <?php if (!empty($evento_para_editar['imagem'])): ?>
                    <p>Imagem atual: <img src="../uploads/<?php echo $evento_para_editar['imagem']; ?>" width="100" style="vertical-align: middle; margin-left: 10px; border-radius: 4px;"></p>
                    <input type="hidden" name="imagem_atual" value="<?php echo $evento_para_editar['imagem']; ?>">
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-adicionar">Atualizar Evento</button>
        </form>
    </div>
</body>
</html>