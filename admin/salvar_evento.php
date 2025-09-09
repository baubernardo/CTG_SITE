<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit(); }

$json_data = file_get_contents('../eventos.json');
$eventos = json_decode($json_data, true);
if (!is_array($eventos)) { $eventos = []; }

$novo_evento = [
    'id'          => uniqid(),
    'titulo'      => $_POST['titulo'],
    'data_evento' => $_POST['data_evento'],
    'horario'     => $_POST['horario'],
    'local'       => $_POST['local'],
    'descricao'   => $_POST['descricao'],
    'imagem'      => null
];

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $pasta_uploads = '../uploads/';
    if (!is_dir($pasta_uploads)) { mkdir($pasta_uploads, 0755, true); }
    $nome_imagem = $novo_evento['id'] . '-' . basename($_FILES['imagem']['name']);
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta_uploads . $nome_imagem);
    $novo_evento['imagem'] = $nome_imagem;
}

$eventos[] = $novo_evento;

file_put_contents('../eventos.json', json_encode($eventos, JSON_PRETTY_PRINT));

header("Location: dashboard.php");
?>