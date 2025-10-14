<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$id_usuario = $_SESSION['id'];

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM reclamacao WHERE id_reclamante = ? ORDER BY id DESC";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id_usuario]);
$reclamacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Minhas Reclamações</title></head>
<body>
<h2>Minhas Reclamações</h2>
<?php foreach ($reclamacoes as $r): ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>ID:</strong> <?= $r['id'] ?><br>
        <strong>Título:</strong> <?= htmlspecialchars($r['titulo']) ?><br>
        <strong>Estado:</strong> <?= htmlspecialchars($r['estado']) ?><br>
        <a href="ver_reclamacao.php?id=<?= $r['id'] ?>">Ver detalhes</a>
    </div>
<?php endforeach; ?>
<a href="painel.php">Voltar</a>
</body>
</html>
