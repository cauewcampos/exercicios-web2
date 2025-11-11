<?php
header('Content-Type: application/json');


$valor1 = $_GET['valor1'];
$valor2 = $_GET['valor2'];


$resultado = $valor1 * $valor2;

echo json_encode(['resultado' => $resultado]);
?>
