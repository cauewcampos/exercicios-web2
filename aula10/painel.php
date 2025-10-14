<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$nome = $_SESSION['nome'];
$tipo = $_SESSION['tipo'];  // 'admin' ou 'usuario'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel</title>
</head>
<body>
<h2>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h2>

<ul>
    <li><a href="minhas_reclamacoes.php">Minhas Reclamações</a></li>
    <li><a href="cadastro_reclamacao.php">Cadastrar Reclamação</a></li>
    <li><a href="todas_reclamacoes.php">Ver Todas as Reclamações</a></li>

    <?php if ($tipo === 'admin'): ?>
        <li><a href="admin_reclamacoes.php">Administração de Reclamações</a></li>
    <?php endif; ?>

    <li><a href="sair.php">Sair</a></li>
</ul>

</body>
</html>
