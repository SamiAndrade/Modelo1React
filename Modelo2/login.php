<?php
session_start();
require_once 'config.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = 'Por favor, preencha todos os campos.';
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['email'] = $usuario['email'];
            setcookie('user_id', $usuario['id'], time() + 3600 * 24 * 30, "/");
            header('Location: home.php');
            exit();
        } else {
            $erro = 'Dados inválidos. Por favor, tente novamente.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modelo2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black text-bg-primary">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="login.php" method="POST" class="d-flex flex-column justify-content-center align-items-center badge bg-secondary w-50 rounded h-75">
            <legend class="mb-4 text-center fs-1">Login</legend>
            <div class="mb-3 d-flex gap-1">
                <label for="email" class="form-label w-25 fs-6 align-self-center">Email</label>
                <input type="email" id="email" name="email" class="form-control w-100 p-2" placeholder="Email" required />
            </div>
            <div class="mb-3 d-flex">
                <label for="senha" class="form-label w-25 fs-6 align-self-center">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control w-100 p-2" placeholder="Senha" required />
            </div>
            <div class="d-flex flex-column gap-3 justify-content-between">
                <button type="submit" class="btn btn-primary w-100 p-2">Login</button>
                <a href="./cadastro.php" class="btn btn-dark ms-2 text-center  w-100 p-2 align-self-end">Cadastrar</a>
            </div>
        </form>
    </div>
</body>
</html>