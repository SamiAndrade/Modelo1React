<?php
session_start();

// Conexão com o banco de Dados
$pdo = new PDO("pgsql:host=localhost;port=5432;dbname=sami", "postgres", "postgres");

// Permite que o servidor aceite requisições de outros domínios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0); // Preflight request, só retorna o cabeçalho sem processar a requisição
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar os dados JSON do frontend
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'];
    $senha = $data['senha'];

    try {
        // Busca o usuário na tabela do banco de dados
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Iniciar a sessão do usuário
            $_SESSION['email'] = $usuario['email'];

            // Aceitar acesso
            echo json_encode(['success' => true]);
        } else {
            // Retornar erro caso e-mail ou senha estejam incorretos
            echo json_encode(['success' => false, 'message' => 'E-mail ou senha inválidos.']);
        }
    } catch (PDOException $e) {
        // Retornar mensagem de aviso ao ter erro no login
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Erro ao processar a requisição.']);
    }
}
