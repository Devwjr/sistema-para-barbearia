<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: painel.php");
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Usuário e senha fixos
    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['admin'] = true;
        header("Location: painel.php");
        exit;
    } else {
        $erro = 'Usuário ou senha incorretos!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login do Administrador</h2>
    <?php if ($erro): ?>
        <p style="color:red;"><?= $erro ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Usuário:</label><br>
        <input type="text" name="usuario"><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha"><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
