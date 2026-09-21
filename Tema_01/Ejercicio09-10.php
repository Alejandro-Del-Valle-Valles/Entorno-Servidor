<?php
    const NUMBERS = [
        'nombre' => [
            'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'
        ],
        'romano' => [
            'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'
        ]
    ];

    $number = askNumber();
    $type = askType();

    if(array_key_exists($type, NUMBERS)) {
        echo NUMBERS[$type][$number - 1];
    }

    function askNumber() : int {
        $number = 0;
        do {
            $number = (int) readline('Introduce un número: ');
        } while($number < 1 || $number > 10);
        return $number;
    }

    function askType() : string {
        $type = '';
        do {
            $type = strtolower(readline('Introduce el formato: '));
        } while(!array_key_exists($type, NUMBERS));
        return $type;
    }
?>