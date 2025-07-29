<?php
    $x = $_GET['A'];
    $y = $_GET['B'];

    $res = $x + $y;
    
    echo "<h3> A soma de $x e $y é: " . number_format($res, 2, '.', ' ') . "</h3>";
?>