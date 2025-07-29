<?php
    $raio = 12;
    $pi = pi();

    $area = $pi * ($raio * $raio);
    
    echo "A area é: " . number_format($area, 2, '.', ' ');
?>
