<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$id_usuario = $_SESSION['id'];

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aprovacao']) && isset($_POST['comentario'])) {
    $sql = "UPDATE reclamacao SET aprovacao = ?, comentario = ? WHERE id = ? AND id_reclamante = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$_POST['aprovacao'], $_POST['comentario'], $id, $id_usuario]);
    echo "Comentário salvo!<br>";
}

$sql = "SELECT * FROM reclamacao WHERE id = ? AND id_reclamante = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id, $id_usuario]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$r) {
    echo "Reclamação não encontrada ou acesso negado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Detalhes da Reclamação</title></head>
<body>
<h2>Detalhes da Reclamação</h2>
<strong>Título:</strong> <?= htmlspecialchars($r['titulo']) ?><br>
<strong>Descrição:</strong> <?= nl2br(htmlspecialchars($r['descricao'])) ?><br>
<?php if ($r['foto']): ?>
    <img src="fotos/<?= htmlspecialchars($r['foto']) ?>" alt="Foto" width="200"><br>
<?php endif; ?>
<strong>Estado:</strong> <?= htmlspecialchars($r['estado']) ?><br>

<?php if ($r['estado'] === 'Resolvida'): ?>
    <form method="post">
        <label>Aprovação:</label><br>
        <select name="aprovacao" required>
            <option value="">--Selecione--</option>
            <option value="Aprovada" <?= $r['aprovacao'] == 'Aprovada' ? 'selected' : '' ?>>Aprovada</option>
            <option value="Reprovada" <?= $r['aprovacao'] == 'Reprovada' ? 'selected' : '' ?>>Reprovada</option>
        </select><br>
        <label>Comentário:</label><br>
        <textarea name="comentario"><?= htmlspecialchars($r['comentario']) ?></textarea><br><br>
        <input type="submit" value="Salvar">
    </form>
<?php else: ?>
    <p>Aprovação e comentário só disponíveis para reclamações resolvidas.</p>
<?php endif; ?>

<a href="minhas_reclamacoes.php">Voltar</a>
</body>
</html>
