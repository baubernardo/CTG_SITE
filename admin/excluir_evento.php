<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit(); }

$id = $_GET['id'];

$json_data = file_get_contents('../eventos.json');
$eventos = json_decode($json_data, true);

$eventos_atualizados = [];
$imagem_para_excluir = null;

foreach ($eventos as $evento) {
    if ($evento['id'] == $id) {
        // Guarda o nome da imagem para excluir o arquivo depois
        $imagem_para_excluir = $evento['imagem'];
    } else {
        // Adiciona ao novo array apenas os eventos que NÃO são para excluir
        $eventos_atualizados[] = $evento;
    }
}

// Salva o novo array (sem o evento excluído) de volta no arquivo
file_put_contents('../eventos.json', json_encode($eventos_atualizados, JSON_PRETTY_PRINT));

// Se havia uma imagem associada, exclui o arquivo dela
if ($imagem_para_excluir && file_exists('../uploads/' . $imagem_para_excluir)) {
    unlink('../uploads/' . $imagem_para_excluir);
}

header("Location: dashboard.php");
exit();
?>