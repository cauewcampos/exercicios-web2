<?php
include 'conexao.php';
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$sql = "SELECT * FROM usuarios WHERE (usuario='$login' OR email='$login') AND senha='$senha' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $_SESSION['usuario_id'] = $row['id'];
  $_SESSION['usuario_nome'] = $row['usuario'];
  header("Location: submissoes.php");
} else {
  echo "<script>alert('Login inválido');window.location='entrada.php';</script>";
}
?>