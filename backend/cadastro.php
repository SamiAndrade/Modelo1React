<?php
require_once './config.php';


// Permite que o servidor aceite requisições de outros domínios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Responder à requisição de verificação CORS
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email']) || empty($_POST['senha'])) {
        echo json_encode(['erro' => 'Por favor, preencha todos os campos.']);
        exit();
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o e-mail já está cadastrado
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuarioExistente = $stmt->fetch();

    if ($usuarioExistente) {
        echo json_encode(['erro' => 'Este e-mail já está registrado.']);
        exit();
    }

    // Criptografar a senha
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // Inserir o novo usuário no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
    $stmt->execute(['email' => $email, 'senha' => $senhaHash]);

    echo json_encode(['sucesso' => 'Cadastro realizado com sucesso. Verifique seu e-mail para ativação.']);
}
