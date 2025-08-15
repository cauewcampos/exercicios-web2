<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<?php
if (!isset($pagina_atual)) $pagina_atual = '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema Aluno</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_atual=='formulario')?'active':''; ?>" href="formulario.php">Cadastrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_atual=='mostrar')?'active':''; ?>" href="mostra.php">Mostrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_atual=='idade')?'active':''; ?>" href="mostra_idade.php">Idade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($pagina_atual=='sair')?'active':''; ?>" href="sair.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>