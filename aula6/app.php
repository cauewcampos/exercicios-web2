<?php
session_start();

if (!isset($_SESSION['lista_tarefas'])) {
    $_SESSION['lista_tarefas'] = [];
}

$pagina_atual = $_GET['page'] ?? 'hoje';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a id="brand-link" class="navbar-brand" href="app.php">Tarefas+</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a id="link-hoje" class="nav-link" href="app.php?page=hoje">Hoje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app.php?page=adicionar">Nova Tarefa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app.php?page=todas">Todas</a>
                </li>
            </ul>
            <span class="navbar-text">
                Total: <?= count($_SESSION['lista_tarefas']) ?>
            </span>
        </div>
    </div>
</nav>

<div class="container mt-4">

<?php if ($pagina_atual === 'adicionar'): ?>
    <h2>Adicionar Nova Tarefa</h2>
    <hr>
    <form action="tarefas.php" method="POST">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título da Tarefa</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" id="data" name="data" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

<?php elseif ($pagina_atual === 'hoje'): ?>
    <?php $data_local = $_GET['data_cliente'] ?? date('Y-m-d'); ?>
    <h2>Tarefas do Dia (<?= date('d/m/Y', strtotime($data_local)) ?>)</h2>
    <hr>
    <ul class="list-group">
        <?php
        $existe_tarefa = false;
        foreach ($_SESSION['lista_tarefas'] as $id => $tarefa) {
            if ($tarefa['data'] === $data_local) {
                $existe_tarefa = true;
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                     . htmlspecialchars($tarefa['titulo'])
                     . "<a href='tarefas.php?acao=apagar&id={$id}' class='btn btn-danger btn-sm'>Remover</a>"
                     . "</li>";
            }
        }
        if (!$existe_tarefa) {
            echo "<p class='text-muted'>Nenhuma tarefa marcada para hoje.</p>";
        }
        ?>
    </ul>

<?php else: ?>
    <h2>Todas as Tarefas</h2>
    <hr>
    <ul class="list-group">
        <?php
        if (empty($_SESSION['lista_tarefas'])) {
            echo "<p class='text-muted'>Nenhuma tarefa cadastrada.</p>";
        } else {
            foreach ($_SESSION['lista_tarefas'] as $id => $tarefa) {
                $data_formatada = date('d/m/Y', strtotime($tarefa['data']));
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                     . htmlspecialchars($tarefa['titulo']) . " <small>(Data: {$data_formatada})</small>"
                     . "<a href='tarefas.php?acao=apagar&id={$id}' class='btn btn-danger btn-sm'>Remover</a>"
                     . "</li>";
            }
        }
        ?>
    </ul>
<?php endif; ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const pagina = params.get('page') || 'hoje';
    const dataUrl = params.get('data_cliente');

    const hoje = new Date();
    const dataFormatada = hoje.toISOString().split('T')[0]; // YYYY-MM-DD

    if (pagina === 'hoje' && dataUrl !== dataFormatada) {
        window.location.href = `app.php?page=hoje&data_cliente=${dataFormatada}`;
    }

    document.getElementById('brand-link').href = `app.php?page=hoje&data_cliente=${dataFormatada}`;
    document.getElementById('link-hoje').href = `app.php?page=hoje&data_cliente=${dataFormatada}`;
});
</script>

</body>
</html>
