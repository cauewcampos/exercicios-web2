<?php
$pg_atual = 'divisao';
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Divisão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container-fluid'>
        <h1>Calculadora de Divisão</h1>
        <form action="divisao.php">
            <label for="num1" class="form-label">Número 1:</label>
            <input type="number" id="num1" name="num1" class="form-control"><br>

            <label for="num2" class="form-label">Número 2:</label>
            <input type="number" id="num2" name="num2" class="form-control"><br>

            <input type="submit" value="Calcular" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
