<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acesso negado.";
    exit;
}

$conexao = new PDO("mysql:host=localhost;dbname=reclama", "root", "");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['estado'])) {
    $sql = "UPDATE reclamacao SET estado = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$_POST['estado'], $_POST['id']]);
    echo "Estado atualizado!<br>";
}

$sql = "SELECT r.*, u.nome FROM reclamacao r JOIN usuarios u ON r.id_reclamante = u.id ORDER BY r.id DESC";
$stmt = $conexao->query($sql);
$reclamacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Administração</title></head>
<body>
<h2>Administração de Reclamações</h2>
<?php foreach ($reclamacoes as $r): ?>
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>ID:</strong> <?= $r['id'] ?><br>
        <strong>Usuário:</strong> <?= htmlspecialchars($r['nome']) ?><br>
        <strong>Título:</strong> <?= htmlspecialchars($r['titulo']) ?><br>
        <strong>Estado atual:</strong> <?= htmlspecialchars($r['estado']) ?><br>
        <form method="post">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <select name="estado" required>
                <option value="Atribuída" <?= $r['estado']=='Atribuída'?'selected':'' ?>>Atribuída</option>
                <option value="Em andamento" <?= $r['estado']=='Em andamento'?'selected':'' ?>>Em andamento</option>
                <option value="Resolvida" <?= $r['estado']=='Resolvida'?'selected':'' ?>>Resolvida</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </div>
<?php endforeach; ?>
<a href="painel.php">Voltar</a>
</body>
</html>
