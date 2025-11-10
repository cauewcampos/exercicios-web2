<!DOCTYPE html>
<html>
<head>
<title>Cadastro - Clube de Escrita</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Cadastro de Usuário</h2>

<form action="salva_usuario.php" method="POST">
    
    <div class="mb-3">
        <label>Nome Completo</label>
        <input type="text" name="nome_completo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Usuário</label>
        <input type="text" name="usuario" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>

    <button class="btn btn-success">Cadastrar</button>
</form>

</body>
</html>
