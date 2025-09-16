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
        <style>
            body { background: #111; color: #d4af37; font-family: Arial, sans-serif; }
            .container { max-width: 400px; margin: 80px auto; background: #222; border-radius: 10px; box-shadow: 0 4px 16px rgba(0,0,0,0.3); padding: 32px; }
            label { color: #d4af37; font-weight: bold; }
            input { width: 100%; padding: 10px; margin: 8px 0 16px 0; border-radius: 5px; border: 1px solid #d4af37; background: #111; color: #fff; }
            button { background: #d4af37; color: #111; border: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer; }
            button:hover { background: #b8952e; }
            .erro { color: #c00; background: #fff3f3; padding: 8px; border-radius: 5px; margin-bottom: 10px; text-align: center; }
        </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align:center;">Login do Administrador</h2>
        <?php if ($erro): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <form id="formLogin" method="post" onsubmit="return mostrarModalLogin();">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit">Entrar</button>
        </form>
        <div id="modalLogin" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);z-index:999;justify-content:center;align-items:center;">
            <div style="background:#fff;color:#222;padding:40px 30px;border-radius:10px;text-align:center;max-width:300px;margin:auto;">
                <h2 style="color:#d4af37;">Login realizado com sucesso!</h2>
                <button onclick="fecharModalLogin()" style="margin-top:20px;background:#d4af37;color:#000;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">Fechar</button>
            </div>
        </div>
        <script>
            function mostrarModalLogin() {
                document.getElementById('modalLogin').style.display = 'flex';
                setTimeout(function(){
                    document.getElementById('formLogin').submit();
                }, 1200);
                return false;
            }
            function fecharModalLogin() {
                document.getElementById('modalLogin').style.display = 'none';
            }
        </script>
    </div>
</body>
</html>
