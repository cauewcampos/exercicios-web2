<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$email, $senha]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];
    header("Location: painel.php");
    exit;
} else {
    echo "Login inválido!<br>";
    echo "<a href='login.php'>Voltar</a>";
}
?>
