<?php
 session_start();

 if(!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
 }
 echo'Bem vindo, ' . $_SESSION['email'];
?>

<a href="logout.php">Sair</a>