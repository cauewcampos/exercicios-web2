<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
        include('atual.php');
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Barra</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a  <?php
                    if($pg_atual == 'home') {
                        echo 'class="nav-link active"';
                    }else{
                            echo 'class="nav-link"';
                        }
                    ?> aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a  <?php
                    if($pg_atual == 'produtos') {
                        echo 'class="nav-link active"';
                    }else{
                            echo 'class="nav-link"';
                        }
                    ?> href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item">
            <a  <?php
                    if($pg_atual == 'carrinho') {
                        echo 'class="nav-link active"';
                    }else{
                            echo 'class="nav-link"';
                        }
                    ?> href="carrinho.php">Carrinho</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</body>
</html>