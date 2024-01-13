<?php
// config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
