<?php
session_start();
require "conexao.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$idUsuario = $_SESSION['id'];
$nomeUsuario = $_SESSION['nome'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeTarefa = $_POST['nome_tarefa'];
    $dataLimite = $_POST['data_limite'];

    $sql = "INSERT INTO tarefas (nome_tarefa, data_limite, usuario_id) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nomeTarefa, $dataLimite, $idUsuario]);
}

$sql = "SELECT * FROM tarefas WHERE usuario_id = ? AND data_limite <= CURDATE() ORDER BY data_limite DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idUsuario]);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Tarefas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?>!</h2>
      <a href="logout.php" class="btn btn-danger">Sair</a>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header bg-success text-white">
        Nova Tarefa
      </div>
      <div class="card-body">
        <form method="POST" class="row g-3">
          <div class="col-md-6">
            <input type="text" name="nome_tarefa" class="form-control" placeholder="Nome da tarefa" required>
          </div>
          <div class="col-md-4">
            <input type="date" name="data_limite" class="form-control" required>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
          </div>
        </form>
      </div>
    </div>

    <a href="todas_tarefas.php" class="btn btn-outline-primary mb-3">📋 Ver todas as tarefas</a>

    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        Tarefas com prazo até hoje
      </div>
      <ul class="list-group list-group-flush">
        <?php if (count($tarefas) > 0): ?>
          <?php foreach ($tarefas as $tarefa): ?>
            <li class="list-group-item">
              <strong><?php echo htmlspecialchars($tarefa['nome_tarefa']); ?></strong>
              <span class="badge bg-secondary">
                prazo: <?php echo htmlspecialchars($tarefa['data_limite']); ?>
              </span>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="list-group-item text-muted">Nenhuma tarefa vencida até hoje 🎉</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</body>
</html>
