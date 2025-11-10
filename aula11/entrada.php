<?php
session_start();
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $login = $conn->real_escape_string($login);


    $sql = "SELECT * FROM usuarios WHERE usuario='$login' OR email='$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($senha == $user['senha']) { 

            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['email'] = $user['email'];

            header("Location: submissoes.php");
            exit();
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário ou email não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Clube de Escrita - Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2 class="mb-4">Login</h2>

<?php if(isset($erro)) echo "<p class='text-danger'>$erro</p>"; ?>

<form method="POST">
    <div class="mb-3">
        <label>Usuário ou Email</label>
        <input type="text" name="login" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100 mb-3">Entrar</button>

    <div class="text-center">
        <a href="cadastro_usuario.php" class="btn btn-link">Criar Conta</a>
    </div>
</form>

</body>
</html>

