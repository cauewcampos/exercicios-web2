<?php 
ob_start(); 
session_start();
include 'menu.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'cancelar') {
    session_unset();
    session_destroy();
    header('Location: local.php'); 
    exit();
}

session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedido Confirmado - Lanchonete Mania</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-header {
      background-image: linear-gradient(90deg, #480ca8, #7b2cbf);
      color: #fff;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg rounded-4 mx-auto" style="max-width: 600px;">
      <div class="card-header text-center">
        <h2 class="mb-0">🎉 Tudo Certo!</h2>
      </div>
      <div class="card-body text-center p-5">
        <h1 class="card-title text-success">Pedido Confirmado!</h1>
        <p class="card-text fs-5 mt-3">
          Seu sanduíche já está sendo preparado. Obrigado pela preferência!
        </p>
        <a href="local.php" class="btn btn-primary btn-lg mt-4 px-5">
          Fazer um Novo Pedido
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
