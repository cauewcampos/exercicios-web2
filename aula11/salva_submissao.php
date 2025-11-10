<?php
require 'conexao.php'; require 'verifica_login.php';
$titulo = $_POST['titulo']; $obs = $_POST['observacoes']; $user = $_SESSION['usuario_id'];
$nome = time() . "_" . $_FILES['arquivo']['name'];
move_uploaded_file($_FILES['arquivo']['tmp_name'], "uploads/".$nome);
$conn->query("INSERT INTO submissoes (usuario_id, titulo, observacoes, arquivo) VALUES ($user, '$titulo', '$obs', '$nome')");
header("Location: submissoes.php");
?>