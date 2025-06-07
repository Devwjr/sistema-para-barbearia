<?php
try {
    // Caminho absoluto do banco
    $caminhoBanco = __DIR__ . '/public/barbearia.db';

    // Conexão
    $db = new PDO("sqlite:$caminhoBanco");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criação da tabela
    $sql = "
        CREATE TABLE IF NOT EXISTS agendamentos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            telefone TEXT NOT NULL,
            data_agendamento TEXT NOT NULL,
            horario TEXT NOT NULL,
            servico TEXT NOT NULL,
            criado_em TEXT DEFAULT CURRENT_TIMESTAMP
        );
    ";

    $db->exec($sql);

    echo "✅ Banco e tabela 'agendamentos' criados com sucesso em: <code>$caminhoBanco</code>";
} catch (PDOException $e) {
    echo "❌ Erro ao criar banco ou tabela: " . $e->getMessage();
}
