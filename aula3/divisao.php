<?php
$pg_atual = 'resultado';
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Divisão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container-fluid'>
        <h1>Resultado:</h1>

<?php
$x = $_GET['num1'];
$y = $_GET['num2'];

function dividir(&$x, $y) {
    $x = $x / $y;
}

dividir($x, $y);
echo "{$_GET['num1']} / {$y} = {$x}";
?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
