<?php
//Realizando a conexão com o banco de dados
$endereco = 'localhost';
$banco = 'sami';
$usuario = 'postgres';
$senha = 'postgres';

try {
    $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    echo 'Falha ao conectar com o banco de dados';
    die($e->getMessage());
}
?>