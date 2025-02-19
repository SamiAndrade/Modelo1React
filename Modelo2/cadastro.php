<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuarioExistente) {
        $erro = 'Este e-mail já está registrado!';
    } else {
        // Criptografando senha
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $stmt->execute(['email' => $email, 'senha' => $senha_hash]);

        $sucesso = 'Cadastro realizado com sucesso! Você pode fazer login agora.';
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
        <form action="cadastro.php" class="d-flex flex-column justify-content-center align-items-center badge bg-secondary w-50 rounded h-75" method="POST" autoComplete="off">

            <legend class="mb-4 text-center fs-1">Cadastro</legend>
            <div class="mb-3 d-flex gap-1">
                <label htmlFor="email" class="form-label w-25 fs-6 align-self-center">Email</label>
                <input type="email" id="email" name="email" class="form-control w-100 p-2" placeholder="Email" />
            </div>
            <div class="mb-3 d-flex">
                <label htmlFor="password" class="form-label w-25 fs-6 align-self-center">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control w-100 p-2" placeholder="Senha" />
            </div>
            <div class="d-flex flex-column gap-3 justify-content-between">
                <button type="submit" name="enviarDados" class="btn btn-primary w-100 p-2">Cadastrar</button>
                <a href="/login" class="btn ms-2 text-center  w-100 p-2 align-self-end">Login</a>
            </div>
        </form>
    </div>
</body>

</html>