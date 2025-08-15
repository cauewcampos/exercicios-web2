<?php
include 'aluno.php';
session_start();    
$pagina_atual = 'mostrar';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0">
    <?php include 'menu.php'; ?>
    <h1 class="text-center my-4">Dados do Aluno</h1>

    <?php if (isset($_SESSION['aluno'])): ?>
        <?php $a = $_SESSION['aluno']; ?>
        <div class="d-flex justify-content-center">
            <div class="card shadow w-50">
                <div class="card-header bg-secondary text-white text-center">
                    Informações do Aluno
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($a->nome) ?></h5>
                    <p class="card-text"><strong>Nascimento:</strong> <?= htmlspecialchars($a->nascimento) ?></p>
                    <p class="card-text"><strong>Matrícula:</strong> <?= htmlspecialchars($a->matricula) ?></p>
                    <p class="card-text"><strong>Curso:</strong> <?= htmlspecialchars($a->curso) ?></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">Nenhum aluno cadastrado.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
