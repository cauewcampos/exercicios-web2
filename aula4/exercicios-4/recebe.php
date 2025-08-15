<?php
session_start();
require 'aluno.php';

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$matricula = $_POST['matricula'];
$curso = $_POST['curso'];

$aluno = new Aluno($nome, $nascimento, $matricula, $curso);
$_SESSION['aluno'] = $aluno;

$pagina_atual = '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<div class="container-FLUID">
    <?php include 'menu.php'; ?>

    <h1 class="m-1">Aluno cadastrado!</h1>
    <button class="btn btn-secondary  m-1" data-bs-toggle="modal" data-bs-target="#modalAluno">Mostrar</button>

    <div class="modal fade" id="modalAluno" tabindex="-1" aria-labelledby="modalAlunoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAlunoLabel">Dados do Aluno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nome:</strong> <?= $aluno->nome ?></p>
                    <p><strong>Nascimento:</strong> <?= $aluno->nascimento ?></p>
                    <p><strong>Matrícula:</strong> <?= $aluno->matricula ?></p>
                    <p><strong>Curso:</strong> <?= $aluno->curso ?></p>
                </div>
            </div>
        </div>
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
