<?php
session_start();

$usuario_form = trim($_POST['usuario']);
$senha_form = trim($_POST['senha']);

$json_data = file_get_contents('../usuarios.json');
$usuarios = json_decode($json_data, true);

$login_sucesso = false;
if (is_array($usuarios)) {
    foreach ($usuarios as $user) {
        if ($user['usuario'] === $usuario_form && password_verify($senha_form, $user['senha'])) {
            $_SESSION['logado'] = true;
            $login_sucesso = true;
            break;
        }
    }
}

if ($login_sucesso) {
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php?erro=1");
    exit();
}
?>