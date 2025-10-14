<?php
session_start();
$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT r.*, u.nome FROM reclamacao r JOIN usuarios u ON r.id_reclamante = u.id ORDER BY r.id DESC";
$stmt = $conexao->query($sql);
$reclamacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Todas as Reclamações</title></head>
<body>
<h2>Todas as Reclamações</h2>
<?php foreach ($reclamacoes as $r): ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>ID:</strong> <?= $r['id'] ?><br>
        <strong>Usuário:</strong> <?= htmlspecialchars($r['nome']) ?><br>
        <strong>Título:</strong> <?= htmlspecialchars($r['titulo']) ?><br>
        <strong>Descrição:</strong> <?= nl2br(htmlspecialchars($r['descricao'])) ?><br>
        <?php if ($r['foto']): ?>
            <img src="fotos/<?= htmlspecialchars($r['foto']) ?>" alt="Foto" width="200"><br>
        <?php endif; ?>
        <strong>Estado:</strong> <?= htmlspecialchars($r['estado']) ?><br>
        <strong>Aprovação:</strong> <?= $r['aprovacao'] ?: '-' ?><br>
        <strong>Comentário:</strong> <?= nl2br(htmlspecialchars($r['comentario'])) ?: '-' ?><br>
    </div>
<?php endforeach; ?>

<a href="painel.php">Voltar</a>
</body>
</html>
