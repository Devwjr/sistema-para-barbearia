<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once '../includes/conexao.php';

<<<<<<< HEAD
// Excluir
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);
    $stmt = $db->prepare("DELETE FROM agendamentos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: painel.php");
    exit;
}

// Editar
$editando = false;
$dados = ['nome' => '', 'telefone' => '', 'data_agendamento' => '', 'horario' => '', 'servico' => ''];
if (isset($_GET['editar'])) {
    $id = intval($_GET['editar']);
    $stmt = $db->prepare("SELECT * FROM agendamentos WHERE id = ?");
    $stmt->execute([$id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $editando = true;
}

// Inserir ou Atualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data_agendamento'];
    $horario = $_POST['horario'];
    $servico = $_POST['servico'];

    if (isset($_POST['id']) && $_POST['id']) {
        $stmt = $db->prepare("UPDATE agendamentos SET nome=?, telefone=?, data_agendamento=?, horario=?, servico=? WHERE id=?");
        $stmt->execute([$nome, $telefone, $data, $horario, $servico, $_POST['id']]);
    } else {
        $stmt = $db->prepare("INSERT INTO agendamentos (nome, telefone, data_agendamento, horario, servico, criado_em) VALUES (?, ?, ?, ?, ?, datetime('now'))");
        $stmt->execute([$nome, $telefone, $data, $horario, $servico]);
    }

    header("Location: painel.php");
    exit;
}

=======
>>>>>>> d98973dce87bc35822f5965752eac37422add82d
$agendamentos = $db->query("SELECT * FROM agendamentos ORDER BY data_agendamento, horario")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<<<<<<< HEAD
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen p-6">

    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-yellow-400">Painel do Administrador</h2>
            <a href="logout.php" class="text-sm bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">Sair</a>
        </div>

        <h3 class="text-2xl font-bold text-yellow-400 mb-4">Atualizar Cadastro</h3>


        <div class="bg-black border border-yellow-400 p-6 rounded-lg mb-8">
            <form method="post" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="hidden" name="id" value="<?= $dados['id'] ?? '' ?>">

                <div>
                    <label class="block text-yellow-400">Nome:</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" class="w-full p-2 rounded bg-black text-white border border-yellow-400">
                </div>

                <div>
                    <label class="block text-yellow-400">Telefone:</label>
                    <input type="text" name="telefone" value="<?= htmlspecialchars($dados['telefone']) ?>" class="w-full p-2 rounded bg-black text-white border border-yellow-400">
                </div>

                <div>
                    <label class="block text-yellow-400">Data:</label>
                    <input type="date" name="data_agendamento" value="<?= htmlspecialchars($dados['data_agendamento']) ?>" class="w-full p-2 rounded bg-black text-white border border-yellow-400">
                </div>

                <div>
                    <label class="block text-yellow-400">Horário:</label>
                    <input type="time" name="horario" value="<?= htmlspecialchars($dados['horario']) ?>" class="w-full p-2 rounded bg-black text-white border border-yellow-400">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-yellow-400">Serviço:</label>
                    <input type="text" name="servico" value="<?= htmlspecialchars($dados['servico']) ?>" class="w-full p-2 rounded bg-black text-white border border-yellow-400">
                </div>

                <div class="md:col-span-2 text-right">
                    <button type="submit" class="mt-4 bg-yellow-400 text-black px-6 py-2 rounded hover:bg-yellow-300">
                        <?= $editando ? 'Atualizar' : 'Cadastrar' ?>
                    </button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-yellow-400 text-sm">
                <thead class="bg-yellow-400 text-black">
                    <tr>
                        <th class="p-2">Nome</th>
                        <th class="p-2">Telefone</th>
                        <th class="p-2">Data</th>
                        <th class="p-2">Horário</th>
                        <th class="p-2">Serviço</th>
                        <th class="p-2">Criado em</th>
                        <th class="p-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $a): ?>
                        <tr class="border-t border-yellow-400">
                            <td class="p-2"><?= htmlspecialchars($a['nome']) ?></td>
                            <td class="p-2"><?= htmlspecialchars($a['telefone']) ?></td>
                            <td class="p-2"><?= htmlspecialchars($a['data_agendamento']) ?></td>
                            <td class="p-2"><?= htmlspecialchars($a['horario']) ?></td>
                            <td class="p-2"><?= htmlspecialchars($a['servico']) ?></td>
                            <td class="p-2"><?= htmlspecialchars($a['criado_em']) ?></td>
                            <td class="p-2 space-x-2">
                                <a href="?editar=<?= $a['id'] ?>" class="bg-yellow-400 text-black px-2 py-1 rounded hover:bg-yellow-300 text-xs">Editar</a>
                                <a href="?excluir=<?= $a['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-400 text-xs">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

=======
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
>>>>>>> d98973dce87bc35822f5965752eac37422add82d
</body>
</html>
