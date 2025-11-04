<?php
/*
class Database {
    private $host = 'localhost';
    private $db_name = 'catraio';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            error_log("Erro de conexão: " . $e->getMessage());
            die("Erro ao conectar ao banco.");
        }

        return $this->conn;
    }
}

// ✅ Criar conexão global
$db = new Database();
$pdo = $db->connect();
*/



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "anderson-mysql-netoanderson192-47bb.h.aivencloud.com";
$port = 22893;
$dbname = "defaultdb";
$username = "avnadmin";
$password = "AVNS_45naHB8nkMmERTdNr00";

$ca_cert_path = __DIR__ . "/ca.pem";

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    $options = [
        PDO::MYSQL_ATTR_SSL_CA => $ca_cert_path,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    //echo "✅ Conexão realizada com sucesso!<br>";

    $stmt = $pdo->query("SELECT VERSION()");
    //echo "MySQL versão: " . $stmt->fetchColumn();

} catch (PDOException $e) {
    //echo "❌ Erro ao conectar: " . $e->getMessage();
}
