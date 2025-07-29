<?php
    $capital = $_GET['capital'];
    $taxa = $_GET['taxa'];
    $tempo = $_GET['tempo'];

    $juros = $capital* ($taxa/100) * $tempo;
    $res = $capital + $juros;
    
    echo "<h3> A valor somado ao juros simples é de : R$" . number_format($res, 2, '.', ' ') . "</h3>";
?>