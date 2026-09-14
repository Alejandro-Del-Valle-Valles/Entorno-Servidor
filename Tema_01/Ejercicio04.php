<?php
    $value;
    $numbers;
    do {
        $value = (int) readline('Introduce un número: ');
        if($value != 0) $numbers[] = $value; 
    } while($value != 0);
    echo "Introduce el número de la operación a realizar:\n";
    echo "1) Sumar\n";
    echo "2) Multiplicar\n";
    $option = (int) readline('Opción: ');
    switch($option) {
        case 1:
            $result = 0;
            for($i = 0; $i < count($numbers); $i++) $result += $numbers[$i];
            echo "Resultado de la suma: $result";
            break;
        case 2:
            $result = 1;
            for($i = 0; $i < count($numbers); $i++) $result *= $numbers[$i];
            echo "Resultado de la multiplicación: $result";
            break;
        default:
            echo 'La opción introducida no es válida.';
            break;
    }
?>