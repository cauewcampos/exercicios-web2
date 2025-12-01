<?php
// logout.php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Destrói a sessão
session_destroy();

// Redireciona o usuário para a página de login
header("Location: index.php"); // CORREÇÃO: Redireciona para o login
exit;
?>