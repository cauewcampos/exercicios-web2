<?php
session_start();

if (!isset($_SESSION['lista_tarefas'])) {
    $_SESSION['lista_tarefas'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['titulo'])) {
    $tarefa = [
        'titulo' => $_POST['titulo'],
        'data'   => $_POST['data']
    ];
    $_SESSION['lista_tarefas'][] = $tarefa;
    header('Location: app.php?page=todas');
    exit();
}

if (!empty($_GET['acao']) && $_GET['acao'] === 'remover') {
    $id = $_GET['id'] ?? null;
    if ($id !== null && isset($_SESSION['lista_tarefas'][$id])) {
        unset($_SESSION['lista_tarefas'][$id]);
        // Reorganiza índices para não quebrar a lista
        $_SESSION['lista_tarefas'] = array_values($_SESSION['lista_tarefas']);
    }
    header('Location: app.php?page=todas');
    exit();
}

header('Location: app.php');
exit();
