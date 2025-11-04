<?php
require 'db.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS sms (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        mensagem TEXT NOT NULL
    )";
    
    $pdo->exec($sql);
    echo "✅ Tabela 'sms' criada com sucesso!";
    
} catch (PDOException $e) {
    echo "❌ Erro: " . $e->getMessage();
}
