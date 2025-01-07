<?php
include 'conexao.php';

$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $data = $_POST['data'] ?? '';
    $horario = $_POST['horario'] ?? '';
    $servico = $_POST['servico'] ?? '';

    if ($nome && $telefone && $data && $horario && $servico) {
        try {
            $query = "INSERT INTO agendamentos (nome, telefone, data_agendamento, horario, servico) VALUES (:nome, :telefone, :data_agendamento, :horario, :servico)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':data_agendamento', $data);
            $stmt->bindValue(':horario', $horario);
            $stmt->bindValue(':servico', $servico);
            $stmt->execute();

            $message = "Agendamento realizado com sucesso!";
        } catch (PDOException $e) {
            $message = "Erro ao agendar: " . $e->getMessage();
        }
    } else {
        $message = "Todos os campos são obrigatórios!";
    }
}

if (isset($_GET['delete'])) {
    $id = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);
    if ($id) {
        try {
            $query = "DELETE FROM agendamentos WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $message = ($stmt->rowCount() > 0) ? "Agendamento deletado com sucesso!" : "Agendamento não encontrado!";
        } catch (PDOException $e) {
            $message = "Erro ao deletar: " . $e->getMessage();
        }
    } else {
        $message = "ID inválido!";
    }
}


try {
    $query = "SELECT * FROM agendamentos ORDER BY data_agendamento, horario";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $message = "Erro ao buscar agendamentos: " . $e->getMessage();
    $agendamentos = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gerenciar Agendamentos</h1>

        <?php if ($message): ?>
        <div class="alert alert-info message">
            <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($agendamentos)): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agendamentos as $agendamento): ?>
                <tr>
                    <td><?= htmlspecialchars($agendamento['id']) ?></td>
                    <td><?= htmlspecialchars($agendamento['nome']) ?></td>
                    <td><?= htmlspecialchars($agendamento['telefone']) ?></td>
                    <td><?= htmlspecialchars($agendamento['servico']) ?></td>
                    <td><?= htmlspecialchars($agendamento['data_agendamento']) ?></td>
                    <td><?= htmlspecialchars($agendamento['horario']) ?></td>
                    <td>
                        <a href="editar_agendamento.php?id=<?= htmlspecialchars($agendamento['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="?delete=<?= htmlspecialchars($agendamento['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="text-center">
            Nenhum agendamento encontrado.
        </p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
