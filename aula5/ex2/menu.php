<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($pg_atual)) {
    $pg_atual = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark rounded shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">🥪 Lanchonete Mania</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarMenu" aria-controls="navbarMenu" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link <?php echo ($pg_atual == 'local') ? 'active' : ''; ?>" 
                 href="local.php">
                Iniciar Pedido
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-danger" href="finalizar.php?acao=cancelar">
                Cancelar Pedido
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
