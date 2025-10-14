<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$id_reclamante = $_SESSION['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$nome_arquivo = $_FILES['foto']['name'];
$tmp_arquivo = $_FILES['foto']['tmp_name'];
$destino = "fotos/" . basename($nome_arquivo);

move_uploaded_file($tmp_arquivo, $destino);

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO reclamacao (id_reclamante, titulo, descricao, foto, estado, aprovacao, comentario) VALUES (?, ?, ?, ?, 'Enviada', '', '')";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id_reclamante, $titulo, $descricao, $nome_arquivo]);

echo "Reclamação cadastrada com sucesso!<br>";
echo "<a href='painel.php'>Voltar ao painel</a>";
?>
