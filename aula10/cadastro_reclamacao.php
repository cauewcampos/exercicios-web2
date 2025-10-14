<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Cadastro de Reclamação</title>
</head>
<body>
<h2>Cadastro de Reclamação</h2>
<form action="salva_reclamacao.php" method="post" enctype="multipart/form-data">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br>
    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br>
    <label>Foto:</label><br>
    <input type="file" name="foto" accept="image/*" required><br><br>
    <input type="submit" value="Enviar Reclamação">
</form>
<a href="painel.php">Voltar</a>
</body>
</html>
