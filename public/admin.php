<?php
require_once '../includes/auth.php';
require_once '../includes/conexao.php';
verificaLogin();

$dataInicio = date('Y-m-01');
$dataFim = date('Y-m-t');

$sqlTotal = "SELECT COUNT(*) as total FROM agendamentos WHERE data BETWEEN ? AND ?";
$stmt = $pdo->prepare($sqlTotal);
$stmt->execute([$dataInicio, $dataFim]);
$totalAgendamentos = $stmt->fetch()['total'];
$faturamento = $totalAgendamentos * 40;

// Lista de agendamentos
$sql = "SELECT * FROM agendamentos ORDER BY data ASC, hora ASC";
$agendamentos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Barbearia</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="p-6 bg-red-600 text-white flex justify-between items-center">
    <h1 class="text-xl font-bold">Painel do Administrador</h1>
    <a href="logout.php" class="bg-white text-red-600 px-4 py-2 rounded hover:bg-red-100">Sair</a>
  </div>

  <div class="p-6">
    <h2 class="text-lg font-semibold mb-4">Faturamento do mês: <span class="text-green-600">R$ <?= number_format($faturamento, 2, ',', '.') ?></span></h2>

    <h2 class="text-lg font-semibold mb-2">Próximos Agendamentos</h2>
    <div class="overflow-x-auto bg-white shadow rounded">
      <table class="w-full text-left table-auto">
        <thead class="bg-red-600 text-white">
          <tr>
            <th class="p-2">Nome</th>
            <th class="p-2">Telefone</th>
            <th class="p-2">Data</th>
            <th class="p-2">Hora</th>
            <th class="p-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($agendamentos as $a): ?>
            <tr class="border-b">
              <td class="p-2"><?= $a['nome'] ?></td>
              <td class="p-2"><?= $a['telefone'] ?></td>
              <td class="p-2"><?= date('d/m/Y', strtotime($a['data'])) ?></td>
              <td class="p-2"><?= $a['hora'] ?></td>
              <td class="p-2">
                <a href="cancelar.php?id=<?= $a['id'] ?>" class="text-red-600 hover:underline">Cancelar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
