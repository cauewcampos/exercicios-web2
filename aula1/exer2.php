<?php
    $raio = $_GET['raio'];
    $pi = pi();

    $area = $pi * ($raio * $raio);
    
    echo "<h3> A area é: " . number_format($area, 2, '.', ' ') . "</h3>";
?>