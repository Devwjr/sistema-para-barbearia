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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-yellow-400 flex items-center justify-center min-h-screen">

    <div class="bg-yellow-500 text-black p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login do Administrador</h2>

        <?php if ($erro): ?>
            <p class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4"><?= $erro ?></p>
        <?php endif; ?>

        <form method="post" class="flex flex-col">
            <label class="mb-1 font-semibold">Usuário:</label>
            <input type="text" name="usuario" class="mb-4 p-2 rounded bg-black text-yellow-400 border border-yellow-400 focus:outline-none">

            <label class="mb-1 font-semibold">Senha:</label>
            <input type="password" name="senha" class="mb-4 p-2 rounded bg-black text-yellow-400 border border-yellow-400 focus:outline-none">

            <button type="submit" class="bg-black text-yellow-400 font-semibold py-2 px-4 rounded hover:bg-yellow-600 hover:text-black transition">
                Entrar
            </button>
        </form>
    </div>

</body>
</html>
