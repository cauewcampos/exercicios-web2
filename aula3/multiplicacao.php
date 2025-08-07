<?php
$pg_atual = 'resultado';
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Multiplicação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container-fluid'>
        <h1>Resultado:</h1>

<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num3 = $_GET['num3'];

$numeros = [$num1, $num2, $num3];

function multiplicar($vetor) {
    $resultado = 1;
    foreach ($vetor as $n) {
        $resultado *= $n;
    }
    return $resultado;
}

$resultado = multiplicar($numeros);
echo "$num1 * $num2 * $num3 = $resultado";
?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
