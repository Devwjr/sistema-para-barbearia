<?php
try {
    $db = new PDO('sqlite:' . __DIR__ . '/../public/barbearia.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}
?>
