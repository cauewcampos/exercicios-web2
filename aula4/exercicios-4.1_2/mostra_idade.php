<?php
include 'aluno.php';  
session_start();    
$pagina_atual = 'idade';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar idade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-0">
    <?php include 'menu.php'; ?>

    <h1 class="text-center">Idade do Aluno</h1>
    <?php
    if (isset($_SESSION['aluno'])) {
        $a = $_SESSION['aluno'];
        echo "<p class='m-1'>{$a->nome}, {$a->idade()} anos</p>";
    } else {
        echo '<div class="alert alert-warning">Nenhum aluno encontrado.</div>';
    }
    ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

