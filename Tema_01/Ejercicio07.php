<?php
    $text = readline('Introduce un texto: ');
    $iterations = (int) readline('Introduce el número de veces: ');
    if($iterations < 1 or $iterations > 6) {
        echo "No puede tener menos de 1 iteración ni más de 6";
        exit;
    }
    for($i = 1; $i <= $iterations; $i++) echo "$<h$i>$text</h$i>\n";
    for($i = $iterations - 1; $i > 0; $i--) echo "$<h$i>$text</h$i>\n";
?>