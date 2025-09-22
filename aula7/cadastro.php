<?php
require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];

    $sql = "INSERT INTO usuarios (usuario, senha, nome, nascimento, cep, numero) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$usuario, $senha, $nome, $nascimento, $cep, $numero]);
        $msg = "<div class='alert alert-success'>✅ Usuário cadastrado com sucesso! <a href='login.php' class='alert-link'>Entrar</a></div>";
    } catch (PDOException $e) {
        $msg = "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Cadastro de Usuário</h3>
      </div>
      <div class="card-body">
        <?php if (!empty($msg)) echo $msg; ?>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" name="usuario" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nascimento</label>
            <input type="date" name="nascimento" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="text" name="numero" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Cadastrar</button>
          <a href="login.php" class="btn btn-link">Já tem conta? Entrar</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
