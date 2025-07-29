<?php
    $x = $_GET['A'];
    $y = $_GET['B'];

    $res = $x / $y;
    
    echo "<h3> A divisão de $x por $y é: " . number_format($res, 2, '.', ' ') . "</h3>";
?>