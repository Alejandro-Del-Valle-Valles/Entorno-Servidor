<?php
    $iterations = (int) readline('Introduce  el número de veces que se debe repetir: ');
    $number = (int) readline('Introduce el número a iterar: ');
    for($iterations; $iterations > 0; $iterations--) {
        for($i = 0; $i < $number; $i++) {
            echo $i;
        }
    }
?>