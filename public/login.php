<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Barbearia</title>
    <link href="tailwind.css" rel="stylesheet">
</head>
<body class="bg-red-100 h-screen flex items-center justify-center">
    <form action="../processa_login.php" method="POST" class="bg-white p-8 rounded shadow-md w-80">
        <h2 class="text-2xl text-red-600 mb-4 font-bold text-center">Login do Administrador</h2>
        <?php if (isset($_SESSION['erro'])): ?>
            <p class="text-red-600 mb-2"><?= $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
        <?php endif; ?>
        <input type="text" name="usuario" placeholder="Usuário" required class="w-full p-2 border rounded mb-4">
        <input type="password" name="senha" placeholder="Senha" required class="w-full p-2 border rounded mb-4">
        <button type="submit" class="bg-red-600 text-white w-full py-2 rounded hover:bg-red-700">Entrar</button>
    </form>
</body>
</html>
