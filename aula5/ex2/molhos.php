<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['molhos'] = $_POST['molhos'] ?? [];
    header('Location: resumo.php');
    exit();
}

$pg_atual = 'molhos';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha dos Molhos - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">🥫 Escolha seus molhos (opcional)</h3>
        <p class="text-muted mb-4">Você pode marcar mais de uma opção</p>
        
        <form action="molhos.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-center">

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="molhos[]" value="Barbecue" id="barbecue">
            <label class="form-check-label fw-semibold" for="barbecue">
                Barbecue
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="molhos[]" value="Molho Especial" id="especial">
            <label class="form-check-label fw-semibold" for="especial">
                Molho Especial
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="molhos[]" value="Pesto" id="pesto">
            <label class="form-check-label fw-semibold" for="pesto">
                Pesto
            </label>
            </div>

            <button type="submit" class="btn btn-success btn-lg mt-4 px-5">
              Ver Resumo →
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
