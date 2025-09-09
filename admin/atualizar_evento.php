<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit(); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido.");
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$data_evento = $_POST['data_evento'];
$horario = $_POST['horario'];
$local = $_POST['local'];
$descricao = $_POST['descricao'];
$imagem_atual = $_POST['imagem_atual'] ?? null;

$json_data = file_get_contents('../eventos.json');
$eventos = json_decode($json_data, true);

$nome_imagem = $imagem_atual;
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    // Apagar imagem antiga se houver uma nova
    if ($imagem_atual && file_exists("../uploads/" . $imagem_atual)) {
        unlink("../uploads/" . $imagem_atual);
    }

    $pasta_uploads = '../uploads/';
    $nome_imagem = $id . '-' . basename($_FILES['imagem']['name']);
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta_uploads . $nome_imagem);
}

foreach ($eventos as $key => $evento) {
    if ($evento['id'] == $id) {
        $eventos[$key]['titulo'] = $titulo;
        $eventos[$key]['data_evento'] = $data_evento;
        $eventos[$key]['horario'] = $horario;
        $eventos[$key]['local'] = $local;
        $eventos[$key]['descricao'] = $descricao;
        $eventos[$key]['imagem'] = $nome_imagem;
        break;
    }
}

file_put_contents('../eventos.json', json_encode($eventos, JSON_PRETTY_PRINT));

header("Location: dashboard.php");
exit();
?>