<?php
session_start();
require_once '../includes/conexao.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $data = trim($_POST['data'] ?? '');
    $horario = trim($_POST['horario'] ?? '');
    $servico = trim($_POST['servico'] ?? '');

    if ($nome && $telefone && $data && $horario && $servico) {
        try {
            $query = "INSERT INTO agendamentos (nome, telefone, data_agendamento, horario, servico) 
                      VALUES (:nome, :telefone, :data_agendamento, :horario, :servico)";
            $stmt = $db->prepare($query);

            // Bind dos parâmetros
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':data_agendamento', $data);
            $stmt->bindValue(':horario', $horario);
            $stmt->bindValue(':servico', $servico);
            $stmt->execute();

     
            header("Location: confirmacao.php");
            exit();
        } catch (PDOException $e) {
            $message = "Erro ao agendar: " . $e->getMessage();
        }
    } else {
        $message = "Todos os campos são obrigatórios!";
    }
}

if ($message) {
    echo "<script>alert(" . json_encode($message) . "); window.history.back();</script>";
}
