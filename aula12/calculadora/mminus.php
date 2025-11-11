<?php
header('Content-Type: application/json');

$valor = $_GET['valor'];

$pdo = new PDO('mysql:host=localhost;dbname=calculadora', 'root', '');

$stmt = $pdo->query("SELECT valor FROM memoria WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$memoria = $row['valor'];

$novoValor = $memoria - $valor;
$stmt = $pdo->prepare("UPDATE memoria SET valor = :valor WHERE id = 1");
$stmt->execute(['valor' => $novoValor]);

echo json_encode(['status' => 'Memória atualizada', 'valor' => $novoValor]);
?>
