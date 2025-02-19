<?php
session_start();
session_destroy(); 

// Remove cookie
setcookie('user_id', '', time() - 3600, "/"); 

header('Location: login.php');  
exit();
?>