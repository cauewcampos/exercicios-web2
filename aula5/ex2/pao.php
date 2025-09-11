<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tipo_pao'])) {
        $_SESSION['pedido']['pao'] = $_POST['tipo_pao'];
    }
    header('Location: carne.php');
    exit();
}

$pg_atual = 'pao';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha do Pão - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">🥖 Escolha o tipo de pão</h3>
        <p class="text-muted mb-4">Selecione uma opção para continuar o seu pedido</p>
        
        <form action="pao.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-start mx-auto" style="max-width: 300px;">

            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipo_pao" id="italiano" value="Italiano Branco" required>
              <label class="form-check-label fw-semibold" for="italiano">
                Pão francês
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipo_pao" id="australiano" value="Australiano">
              <label class="form-check-label fw-semibold" for="australiano">
                Australiano
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipo_pao" id="graos" value="7 Grãos">
              <label class="form-check-label fw-semibold" for="graos">
                Pão de Hamburguer
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipo_pao" id="baguete" value="Baguete">
              <label class="form-check-label fw-semibold" for="baguete">
                Baguete
              </label>
            </div>

          </div>

          <button type="submit" class="btn btn-primary btn-lg mt-4 px-5">
            Próximo →
          </button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php ob_end_flush(); ?>
