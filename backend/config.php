<?php
// Configurar variáveis para conectar ao banco de dados
$host = 'localhost';
$dbname = 'sami';
$username = 'postgres';
$password = 'postgres';

try {
    // Acessar banco de dados
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Falha na conexão com o banco de dados: ' . $e->getMessage());
}

