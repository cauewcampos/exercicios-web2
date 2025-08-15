<?php 
session_start();
$pagina_atual = 'formulario';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid p-0">
        <?php include 'menu.php'; ?>
        <h1 class="text-center">Cadastro de Aluno</h1>
        <form action="recebe.php" method="post" class="row g-3 m-3">
            <div class="col-12">
                <label class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Data de Nascimento:</label>
                <input type="date" name="nascimento" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Matrícula:</label>
                <input type="text" name="matricula" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Curso:</label>
                <input type="text" name="curso" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Cadastrar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

