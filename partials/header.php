<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTG Carreteiros de Horizonte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content-wrapper">
        <header>
            <a href="index.php"><img src="img/logo.png" alt="Logo CTG Carreteiros de Horizonte"></a>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php" class="<?php echo ($pagina_atual == 'index.php') ? 'active' : ''; ?>">Apresentação</a></li>
                    <li><a href="historia.php" class="<?php echo ($pagina_atual == 'historia.php') ? 'active' : ''; ?>">Nossa História</a></li>
                    <li><a href="invernadas.php" class="<?php echo ($pagina_atual == 'invernadas.php') ? 'active' : ''; ?>">Invernadas</a></li>
                    <li><a href="eventos.php" class="<?php echo ($pagina_atual == 'eventos.php') ? 'active' : ''; ?>">Eventos</a></li>
                    <li><a href="contato.php" class="<?php echo ($pagina_atual == 'contato.php') ? 'active' : ''; ?>">Contato</a></li>
                </ul>
            </nav>
        </header>