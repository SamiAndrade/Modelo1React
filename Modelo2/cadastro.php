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
    <div class="container">
        <form action="cadastro.php" method="POST" autoComplete="off">

            <legend>Cadastro</legend>
            <div>
                <label htmlFor="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
            </div>
            <div>
                <label htmlFor="password">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" />
            </div>
            <div>
                <button type="submit" name="enviarDados" class="btn btn-primary">Cadastrar</button>
                <a href="/login">Login</a>
            </div>
        </form>
    </div>
</body>

</html>