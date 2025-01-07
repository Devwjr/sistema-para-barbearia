
CREATE DATABASE IF NOT EXISTS barbearia;
USE barbearia;

CREATE TABLE IF NOT EXISTS agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    data_agendamento DATE NOT NULL,
    horario TIME NOT NULL,
    servico VARCHAR(100) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
