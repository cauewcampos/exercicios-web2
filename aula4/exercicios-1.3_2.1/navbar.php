<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="primeira.php">Sessão</a>
            <div class="d-flex align-items-center">
                <?php
                    session_start();
                    if(!isset($_SESSION['nome'])){
                        echo "<button class='btn btn-success me-2' id='btnEntrar' type='button' onclick=\"window.location.href='primeira.php'\">
                        <span>Entrar</span>
                        </button>";
                    }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                            if($atual == 'primeira.php') {
                                echo '<a class="nav-link active fw-semibold" href="primeira.php">Inserir nome</a>';
                            } else {
                                echo '<a class="nav-link" href="primeira.php">Inserir nome</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                            if($atual == 'salvar-nome.php') {
                                echo '<a class="nav-link active fw-semibold" href="salvar-nome.php">Salvar nome</a>';
                            } else {
                                echo '<a class="nav-link" href="salvar-nome.php">Salvar nome</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                            if($atual == 'mostrar-nome.php') {
                                echo '<a class="nav-link active fw-semibold" href="mostrar-nome.php">Ver nome</a>';
                            } else {
                                echo '<a class="nav-link" href="mostrar-nome.php">Ver nome</a>';
                            }
                        ?> 
                    </li>
                    <li class="nav-item">
                        <?php
                            if($atual == 'encerra-sessao.php') {
                                echo '<a class="nav-link active fw-semibold" href="encerra-sessao.php">Encerrar nome</a>';
                            } else {
                                echo '<a class="nav-link" href="encerra-sessao.php">Encerrar sessão</a>';
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
