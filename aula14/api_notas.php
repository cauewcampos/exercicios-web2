<?php
// api_notas.php
require 'db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['usuario_id'];
$semestre = $_GET['semestre'] ?? 'todos';
$situacao = $_GET['situacao'] ?? 'todos';

// AQUI ESTÁ O FILTRO CRÍTICO: SOMENTE NOTAS DO USUÁRIO LOGADO
$sql = "SELECT * FROM notas WHERE usuario_id = ?";
$params = [$user_id]; 
// ... (continua a lógica dos filtros de semestre e situação) ...

// Adiciona filtro de Semestre
if ($semestre !== 'todos') {
    $sql .= " AND semestre = ?";
    $params[] = $semestre;
}

// Adiciona filtro de Situação (Aprovado, Reprovado, Cursando)
if ($situacao !== 'todos') {
    $sql .= " AND situacao LIKE ?"; 
    $params[] = "%$situacao%";
}

$sql .= " ORDER BY semestre ASC, disciplina ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>