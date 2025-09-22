<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$idUsuario = $_SESSION['id'];
$nomeUsuario = $_SESSION['nome'];

$sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY data_limite ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idUsuario]);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Todas as Tarefas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Todas as tarefas de <?php echo htmlspecialchars($nomeUsuario); ?></h2>
      <a href="tarefas.php" class="btn btn-secondary">⬅️ Voltar</a>
    </div>

    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        Lista de todas as tarefas
      </div>
      <ul class="list-group list-group-flush">
        <?php if (count($tarefas) > 0): ?>
          <?php foreach ($tarefas as $tarefa): ?>
            <li class="list-group-item d-flex justify-content-between">
              <span><strong><?php echo htmlspecialchars($tarefa['nome_tarefa']); ?></strong></span>
              <span class="badge bg-info text-dark">
                prazo: <?php echo htmlspecialchars($tarefa['data_limite']); ?>
              </span>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="list-group-item text-muted">Nenhuma tarefa cadastrada ainda 📭</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</body>
</html>
