<?php
ob_start();
session_start();

$pg_atual = 'resumo';
include 'menu.php';

if (!isset($_SESSION['pedido']) || empty($_SESSION['pedido'])) {
    header('Location: local.php');
    exit();
}

$pedido = $_SESSION['pedido'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resumo do Pedido - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-header {
      background-color: #6f42c1;
      color: #fff;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
      <div class="card-header text-center">
        <h2 class="mb-0">📝 Resumo do seu Pedido</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Local:</strong> <?php echo htmlspecialchars($pedido['local'] ?? 'Não escolhido'); ?></li>
        <li class="list-group-item"><strong>Pão:</strong> <?php echo htmlspecialchars($pedido['pao'] ?? 'Não escolhido'); ?></li>
        <li class="list-group-item"><strong>Carne:</strong> <?php echo htmlspecialchars($pedido['carne'] ?? 'Não escolhida'); ?></li>
        <li class="list-group-item"><strong>Vegetais:</strong> <?php echo !empty($pedido['vegetais']) ? htmlspecialchars(implode(', ', $pedido['vegetais'])) : "Nenhum"; ?></li>
        <li class="list-group-item"><strong>Queijos:</strong> <?php echo !empty($pedido['queijos']) ? htmlspecialchars(implode(', ', $pedido['queijos'])) : "Nenhum"; ?></li>
        <li class="list-group-item"><strong>Molhos:</strong> <?php echo !empty($pedido['molhos']) ? htmlspecialchars(implode(', ', $pedido['molhos'])) : "Nenhum"; ?></li>
      </ul>
    <div class="card-body text-center">
    <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
        <a href="pagamento.php" class="btn btn-success btn-lg px-4">
        ✅ Ir para o pagamento do pedido
        </a>
        <a href="local.php" class="btn btn-danger btn-lg px-4">
        🔄 Refazer Pedido
        </a>
    </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
