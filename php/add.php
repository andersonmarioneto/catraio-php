<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST['nome'] ?? "";
    $email = $_POST['email'] ?? "";
    $mensagem = $_POST['mensagem'] ?? "";

    try {
        $sql = "INSERT INTO sms (nome, email, mensagem) VALUES (:nome, :email, :mensagem)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensagem', $mensagem);

        $stmt->execute();

        //echo "✅ Mensagem enviada com sucesso!";
        header("Location: ../index.php");
        exit;
    } catch (PDOException $e) {
        //echo "❌ Erro ao enviar mensagem: " . $e->getMessage();
        header("Location: ../index.php");
        exit;
    }
}
