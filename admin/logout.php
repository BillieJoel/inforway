<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Destruir a sessão
session_destroy();

// Redirecionar para a página de login ou qualquer outra página desejada
header("Location: ../login.php");
exit();
?>
