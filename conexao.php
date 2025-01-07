<?php
try {
    // Conexão com SQLite
    $db = new PDO('sqlite:barbearia.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}
?>
