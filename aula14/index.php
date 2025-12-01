<?php
require 'db.php';
session_start();

if (isset($_POST['btn_cadastro'])) {
    $usuario = $_POST['usuario']; 
    $senha = $_POST['senha'];
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT); 

    try {
        $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$usuario, $senha_hash])) {
            echo "<script>alert('Usuário cadastrado! Faça login.');</script>";
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            echo "<script>alert('Este nome de usuário já existe.');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.');</script>";
        }
    }
}

if (isset($_POST['btn_login'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Usuário ou senha inválidos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 100%; max-width: 400px; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background: white; }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-4">Acesso ao Sistema</h3>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Usuário (Matrícula)</label>
            <input type="text" name="usuario" class="form-control" placeholder="Ex: aluno123" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" name="btn_login" class="btn btn-primary w-100">Entrar</button>
    </form>
    
    <div class="text-center mt-3">
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalCadastro">Não tem conta? Cadastre-se</a>
    </div>
</div>

<div class="modal fade" id="modalCadastro" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Criar Usuário</label>
                <input type="text" name="usuario" class="form-control" placeholder="Ex: aluno123" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Criar Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" name="btn_cadastro" class="btn btn-success w-100">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>