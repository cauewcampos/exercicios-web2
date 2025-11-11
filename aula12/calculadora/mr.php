<?php
header('Content-Type: application/json');


$pdo = new PDO('mysql:host=localhost;dbname=calculadora', 'root', '');

$stmt = $pdo->query("SELECT valor FROM memoria WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(['valor' => $row['valor']]);
?>
