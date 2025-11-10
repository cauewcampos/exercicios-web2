<?php // salva_avaliacao.php
require 'conexao.php'; require 'verifica_login.php';
$sub = $_POST['submissao_id'];
$user = $_SESSION['usuario_id'];
$ap = $_POST['aprovado'];
$com = $_POST['comentario'];
$conn->query("INSERT INTO avaliacoes (submissao_id, usuario_id, aprovado, comentario) VALUES ($sub, $user, $ap, '$com')");
header("Location: submissoes.php");
?>