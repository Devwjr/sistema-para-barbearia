<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once '../includes/conexao.php';

$agendamentos = $db->query("SELECT * FROM agendamentos ORDER BY data_agendamento, horario")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel do Administrador</title>
</head>
<body>
    <h2>Agendamentos</h2>
    <p><a href="logout.php">Sair</a></p>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Serviço</th>
            <th>Criado em</th>
        </tr>
        <?php foreach ($agendamentos as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['nome']) ?></td>
                <td><?= htmlspecialchars($a['telefone']) ?></td>
                <td><?= htmlspecialchars($a['data_agendamento']) ?></td>
                <td><?= htmlspecialchars($a['horario']) ?></td>
                <td><?= htmlspecialchars($a['servico']) ?></td>
                <td><?= htmlspecialchars($a['criado_em']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
