<?php
session_start();
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
    echo "<script>alert('$message'); window.history.back();</script>";
}
?>
