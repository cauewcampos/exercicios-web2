<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Nome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
        $atual = 'salvar-nome.php';
        include "navbar.php";
        
        if(isset($_POST['nome'])) {
            $_SESSION['nome'] = $_POST['nome'];
            echo "<script>document.getElementById('btnEntrar').style.display = 'none';</script>";
            echo "<p class='m-1'>O nome <strong>" . $_SESSION['nome'] . "</strong> foi registrado com sucesso!</p>";
            echo "<a href='mostrar-nome.php' class='btn btn-secondary mx-1'>Ver nome</a>";
        }
        else{
            echo "<p class='m-1'>Por favor, digite um nome válido.</p>";
            exit;
        }
    ?>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>