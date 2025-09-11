<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['vegetais'] = $_POST['vegetais'] ?? [];
    header('Location: queijos.php');
    exit();
}

$pg_atual = 'vegetais';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha dos Vegetais - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">🥗 Escolha seus vegetais</h3>
        <p class="text-muted mb-4">Selecione os vegetais que deseja adicionar (opcional)</p>
        
        <form action="vegetais.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-start mx-auto" style="max-width: 300px;">

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="alface" value="Alface">
            <label class="form-check-label fw-semibold" for="alface">Alface</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="rucula" value="Rúcula">
            <label class="form-check-label fw-semibold" for="rucula">Rúcula</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="tomate" value="Tomate">
            <label class="form-check-label fw-semibold" for="tomate">Tomate</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="cebola" value="Cebola">
            <label class="form-check-label fw-semibold" for="cebola">Cebola</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="pimentao" value="Pimentão">
            <label class="form-check-label fw-semibold" for="pimentao">Pimentão</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vegetais[]" id="pepino" value="Pepino">
            <label class="form-check-label fw-semibold" for="pepino">Pepino</label>
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
