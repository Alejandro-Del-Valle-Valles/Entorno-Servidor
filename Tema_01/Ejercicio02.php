<?php
    const pattern = '+-.';
    $j = 0;
    $value = readline("Introduce un número: ");
    for($value; $value > 0; $value--) {
        for($i = 0; $i < $value; $i++) {
            $j = $j > 2 ? 0 : $j;
            echo pattern[$j];
            $j++;
        }
        echo "\n";
    }
?>