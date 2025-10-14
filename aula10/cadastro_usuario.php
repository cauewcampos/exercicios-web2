<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Cadastro de Usuário</title>
</head>
<body>
<h2>Cadastro de Usuário</h2>
<form action="salva_usuario.php" method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Senha:</label><br>
    <input type="password" name="senha" required><br>
    <label>CPF:</label><br>
    <input type="text" name="cpf" required><br>
    <label>Nascimento:</label><br>
    <input type="date" name="nascimento" required><br>
    <label>Tipo:</label><br>
    <select name="tipo" required>
        <option value="usuario">Usuário</option>
        <option value="admin">Administrador</option>
    </select><br><br>
    <input type="submit" value="Cadastrar">
</form>
</body>
</html>
