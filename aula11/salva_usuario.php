<?php
include "conexao.php";

$nome_completo = $_POST['nome_completo'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (nome_completo, usuario, email, data_nascimento, cpf, senha) 
        VALUES ('$nome_completo', '$usuario', '$email', '$data_nascimento', '$cpf', '$senha')";

if ($conn->query($sql) === TRUE) {
    header("Location: entrada.php");
    exit();
} else {
    echo "Erro: " . $conn->error;
}
