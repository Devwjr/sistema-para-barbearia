<?php
include 'conexao.php';

$message = '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $data_agendamento = $_POST['data_agendamento'] ?? '';
    $horario = $_POST['horario'] ?? '';
    $servico = $_POST['servico'] ?? '';

    if ($nome && $telefone && $data_agendamento && $horario && $servico) {
        try {
            $query = "UPDATE agendamentos SET nome = :nome, telefone = :telefone, data_agendamento = :data_agendamento, horario = :horario, servico = :servico WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':data_agendamento', $data_agendamento);
            $stmt->bindValue(':horario', $horario);
            $stmt->bindValue(':servico', $servico);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $message = "Agendamento atualizado com sucesso!";
        } catch (PDOException $e) {
            $message = "Erro ao atualizar agendamento: " . $e->getMessage();
        }
    } else {
        $message = "Todos os campos são obrigatórios!";
    }
}

if ($id) {
    try {
        $query = "SELECT * FROM agendamentos WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $agendamento = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = "Erro ao buscar agendamento: " . $e->getMessage();
    }
}

if (!$agendamento) {
    die("Agendamento não encontrado!");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Agendamento</h1>

        <?php if ($message): ?>
        <div class="alert alert-info message">
            <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($agendamento['nome']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($agendamento['telefone']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_agendamento" class="form-label">Data</label>
                <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" value="<?= htmlspecialchars($agendamento['data_agendamento']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Hora</label>
                <input type="time" class="form-control" id="horario" name="horario" value="<?= htmlspecialchars($agendamento['horario']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="servico" class="form-label">Serviço</label>
                <input type="text" class="form-control" id="servico" name="servico" value="<?= htmlspecialchars($agendamento['servico']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="admin.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
