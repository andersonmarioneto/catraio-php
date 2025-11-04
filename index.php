<?php require "php/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mensagens</title>
</head>
<body>

<h3>Enviar mensagem</h3>
<form method="POST" action="php/add.php">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <textarea name="mensagem" placeholder="Mensagem" required></textarea><br><br>
    <button type="submit">Enviar a mensagem</button>
</form>

<hr>

<h3>Mensagens recebidas</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Mensagem</th>
    </tr>

<?php 
$stmt = $pdo->query("SELECT * FROM sms ORDER BY id DESC");
$sms = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($sms as $m) {
    echo "<tr>";
    echo "<td>{$m['id']}</td>";
    echo "<td><b>{$m['nome']}</b></td>";
    echo "<td>{$m['email']}</td>";
    echo "<td>{$m['mensagem']}</td>";
    echo "</tr>";
}
?>
</table>


</body>
</html>
