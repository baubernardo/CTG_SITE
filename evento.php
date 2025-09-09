<?php
$id = $_GET['id'];
$json_data = file_get_contents('eventos.json');
$eventos = json_decode($json_data, true);
$evento_encontrado = null;
if (is_array($eventos)) {
    foreach ($eventos as $e) {
        if ($e['id'] == $id) {
            $evento_encontrado = $e;
            break;
        }
    }
}
if (!$evento_encontrado) { die("Evento não encontrado."); }
$evento = $evento_encontrado;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($evento['titulo']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content-wrapper">
        <header>
            <a href="index.php"><img src="img/logo.png" alt="Logo CTG Carreteiros de Horizonte"></a>
        </header>

        <div class="container evento-detalhe">
            <a href="index.php" class="btn btn-voltar" style="margin-bottom: 20px;"><< Voltar à lista</a>
            <hr>
            <h1><?php echo htmlspecialchars($evento['titulo']); ?></h1>
            
            <?php if (!empty($evento['imagem'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($evento['imagem']); ?>" alt="<?php echo htmlspecialchars($evento['titulo']); ?>">
            <?php endif; ?>

            <p><strong>Data:</strong> <?php echo date("d/m/Y", strtotime($evento['data_evento'])); ?></p>
            <p><strong>Horário:</strong> <?php echo htmlspecialchars($evento['horario']); ?></p>
            <p><strong>Local:</strong> <?php echo htmlspecialchars($evento['local']); ?></p>
            
            <hr>
            <h3>Descrição</h3>
            <div><?php echo nl2br(htmlspecialchars($evento['descricao'])); ?></div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> CTG Carreteiros de Horizonte. Todos os direitos reservados.</p>
    </footer>
</body>
</html>