<?php
    $value;
    $max = 0;
    $min = 0;
    do {
        $value = (int) readline("Introduce un número: ");
        $max = $max < $value ? $value : $max;
        $min = $min > $value ? $value : $min;
    } while($value != 0);
    echo "Máximo: $max\n";
    echo "Mínimo: $min";
?>