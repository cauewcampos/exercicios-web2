<?php
header('Content-Type: application/json');

$valor = $_GET['valor'];

if ($valor < 0) {
    echo json_encode(['erro' => 'Não é possível calcular a raiz quadrada de um número negativo']);
    exit();
}

$resultado = sqrt($valor);

echo json_encode(['resultado' => $resultado]);
?>
