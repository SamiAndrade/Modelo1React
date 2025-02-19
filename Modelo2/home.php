<?php
 session_start();

 if(!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <title>Modelo2</title>
</head>
<body>
   <section class="bg-black badge w-50 d-flex justify-content-center align-items-center fs-4 mb-4" style="height: 10em">
      <p>Bem vindo, <?php echo $_SESSION['email']; ?></p>
   </section>
   <a href="logout.php" class="btn btn-danger form-control d-flex flex-column" style="width:5em">Sair</a>
</body>
</html>