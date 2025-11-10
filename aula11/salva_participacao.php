<?php
require 'conexao.php'; require 'verifica_login.php';
$id = $_POST['atividade_id']; $u = $_SESSION['usuario_id']; $c = $_POST['comentario'];
$conn->query("INSERT INTO participacoes (atividade_id, usuario_id, comentario) VALUES ($id, $u, '$c')");
header("Location: participa_atividade.php?id=$id");
?>