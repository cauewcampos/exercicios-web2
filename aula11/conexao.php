<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "clube_escrita";
$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_errno) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>