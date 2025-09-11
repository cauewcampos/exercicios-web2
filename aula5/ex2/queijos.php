<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pedido']['queijos'] = $_POST['queijos'] ?? [];
    header('Location: molhos.php');
    exit();
}

$pg_atual = 'queijos';
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha do Queijo - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body text-center p-5">
        <h3 class="card-title mb-4">🧀 Escolha seu queijo (opcional)</h3>
        <p class="text-muted mb-4">Você pode marcar mais de uma opção</p>
        
        <form action="queijos.php" method="post">
          <div class="d-flex flex-column gap-3 align-items-center">

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="queijos[]" value="Cheddar" id="cheddar">
              <label class="form-check-label fw-semibold" for="cheddar">
                Cheddar
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="queijos[]" value="Prato" id="prato">
              <label class="form-check-label fw-semibold" for="prato">
                Prato
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="queijos[]" value="Muçarela" id="mucarela">
              <label class="form-check-label fw-semibold" for="mucarela">
                Muçarela
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="queijos[]" value="Parmesão" id="parmesao">
              <label class="form-check-label fw-semibold" for="parmesao">
                Parmesão
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
