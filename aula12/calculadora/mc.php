<?php
header('Content-Type: application/json');

$pdo = new PDO('mysql:host=localhost;dbname=calculadora', 'root', '');

$stmt = $pdo->prepare("UPDATE memoria SET valor = 0 WHERE id = 1");
$stmt->execute();

echo json_encode(['status' => 'Memória limpa']);
?>
