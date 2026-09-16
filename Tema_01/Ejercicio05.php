<?php
    const PATTERN = ['as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey'];
    $times = (int) readline('Introduce un número: ');
    $i = 0;
    for($j = 0; $j < $times; $j++) {
        echo PATTERN[$i].' ';
        $i = $i == count(PATTERN) - 1  ? 0 : $i + 1;
    }
?>