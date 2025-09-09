<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Administração</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="login-wrapper">
    <form action="auth.php" method="POST" class="login-form">
        <img src="../img/logo.png" alt="Logo CTG">
        <h2>Acesso ao Painel</h2>
        <div class="form-group">
            <label for="usuario" style="text-align: left;">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <div class="form-group">
            <label for="senha" style="text-align: left;">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-adicionar" style="width: 100%; margin-top: 10px;">Entrar</button>
    </form>
</body>
</html>