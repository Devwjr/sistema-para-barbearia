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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .titulo-principal {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            margin-bottom: 20px;
        }
        .table th, .table td {
            color: white;
        }
        .table thead th {
            background-color: black;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: black;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: black;
        }
        .btn-custom {
            background-color: #FFD700;
            color: #000;
            border: none;
            border-radius: 16px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #FFC107;
        }
        .mensagem-info {
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .nenhum-agendamento {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo-principal">Gerenciar Agendamentos</h1>

        <?php if ($message): ?>
        <div class="mensagem-info">
            <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($agendamentos)): ?>
        <table class="table table-striped">
            <thead>
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
                        <a href="editar_agendamento.php?id=<?= htmlspecialchars($agendamento['id']) ?>" class="btn btn-custom">Editar</a>
                        <a href="?delete=<?= htmlspecialchars($agendamento['id']) ?>" class="btn btn-custom" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="nenhum-agendamento">
            Nenhum agendamento encontrado.
        </p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
