<?php
ob_start();
session_start();

$pg_atual = 'pagamento';
include 'menu.php';

if (!isset($_SESSION['pedido']) || empty($_SESSION['pedido'])) {
    header('Location: local.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pedido']['pagamento'] = $_POST['metodo_pagamento'] ?? '';
    header('Location: finalizar.php'); // envia direto para finalizar
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagamento - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 500px;">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">💳 Escolha seu método de pagamento</h3>
        <p class="text-muted mb-4">Selecione uma das opções abaixo para finalizar seu pedido</p>
        
        <form action="pagamento.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-start mx-auto" style="max-width: 300px;">

            <div class="form-check">
              <input class="form-check-input" type="radio" name="metodo_pagamento" id="pix" value="PIX" required>
              <label class="form-check-label fw-semibold" for="pix">💚 PIX</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="metodo_pagamento" id="cartao" value="Cartão">
              <label class="form-check-label fw-semibold" for="cartao">💳 Cartão de Crédito/Débito</label>
            </div>

          </div>

          <button type="submit" class="btn btn-success btn-lg mt-4 px-5">
            Finalizar Pedido →
          </button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
