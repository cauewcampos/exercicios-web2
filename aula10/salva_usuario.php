<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$tipo = $_POST['tipo'];

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO usuarios (nome, email, senha, cpf, nascimento, tipo) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->execute([$nome, $email, $senha, $cpf, $nascimento, $tipo]);

echo "Usuário cadastrado com sucesso!<br>";
echo "<a href='login.php'>Ir para login</a>";
?>
