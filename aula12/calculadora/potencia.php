<?php

header('Content-Type: application/json');

$x = $_GET['x'];
$y = $_GET['y'];

$potencia = $x ** $y;

echo json_encode(['potencia' => $potencia]);
?>