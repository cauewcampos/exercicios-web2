<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Resultado dos Juros</title>
</head>
<body>
  <?php
    $capital = $_GET['capital'];
    $taxa = $_GET['taxa'];
    $tempo = $_GET['tempo'];

    function calcularJurosSimples($capital, $taxa, $tempo) {
        $juros = $capital * ($taxa / 100) * $tempo;
        return $juros;
    }

    function calcularJurosCompostos($capital, $taxa, $tempo) {
        $montante = $capital * pow(1 + ($taxa / 100), $tempo);
        $juros = $montante - $capital;
        return $juros;
    }

    echo "Juros Simples: R$ " . calcularJurosSimples($capital, $taxa, $tempo) . "<br>";
    echo "Juros Compostos: R$ " . calcularJurosCompostos($capital, $taxa, $tempo);
  ?>
</body>
</html>
