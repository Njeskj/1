<?php
// logout.php
session_start();

// Encerra a sessão
session_unset();
session_destroy();

// Redireciona o usuário de volta para a página de login após o logout
header("Location: ../pages/login.php");
exit();
?>
