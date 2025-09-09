<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit();
}

$json_data = file_get_contents('../eventos.json');
$eventos = json_decode($json_data, true);
if (!is_array($eventos)) { $eventos = []; }

// Ordena para mostrar os mais recentes primeiro
usort($eventos, function($a, $b) {
    return strtotime($b['data_evento']) <=> strtotime($a['data_evento']);
});
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Administração</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container admin-container">
        <h1>Gerenciador de Eventos</h1>
        <p>
            <a href="adicionar_evento.php" class="btn btn-adicionar">+ Adicionar Novo Evento</a>
            <a href="logout.php" class="btn btn-excluir" style="float:right;">Sair</a>
        </p>
        <hr>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($eventos as $evento): ?>
                <tr>
                    <td><?php echo htmlspecialchars($evento['titulo']); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($evento['data_evento'])); ?></td>
                    <td>
                        <a href="editar_evento.php?id=<?php echo $evento['id']; ?>" class="btn btn-editar">Editar</a>
                        <a href="excluir_evento.php?id=<?php echo $evento['id']; ?>" class="btn btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este evento?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>