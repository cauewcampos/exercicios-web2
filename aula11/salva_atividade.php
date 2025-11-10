<?php
require 'conexao.php'; require 'verifica_login.php';
$t = $_POST['titulo']; $c = $_POST['comentario']; $u = $_SESSION['usuario_id'];
$conn->query("INSERT INTO atividades (usuario_id, titulo, comentario) VALUES ($u, '$t', '$c')");
header("Location: atividades.php");
?>