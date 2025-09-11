<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['leva_loca'])) {
        $_SESSION['pedido']['local'] = $_POST['leva_loca'];
    }
    header('Location: pao.php');
    exit();
}

$pg_atual = 'local';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha do Local - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">🍔 Onde você quer aproveitar seu pedido?</h3>
        <p class="text-muted mb-4">Escolha uma das opções para continuar</p>
        
        <form action="local.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-center">
            
            <div class="form-check">
              <input class="form-check-input" type="radio" name="leva_loca" id="levar" value="Levar" required>
              <label class="form-check-label fw-semibold" for="levar">
                Levar meu pedido
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="leva_loca" id="comer" value="Comer no Local">
              <label class="form-check-label fw-semibold" for="comer">
                Comer no local
              </label>
            </div>

            <button type="submit" class="btn btn-primary btn-lg mt-4 px-5">
              Próximo →
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
