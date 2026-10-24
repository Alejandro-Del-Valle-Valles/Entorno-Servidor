<?php
function conjugar($verbo) {
    $conjugacion = [];
    $terminacion = substr($verbo, -2);
    switch($terminacion) {
        case 'ar':
            $conjugacion = ['o', 'as', 'a', 'amos', 'ais', 'an'];
            break;
        case 'er':
            $conjugacion = ['o', 'es', 'e', 'emos', 'eis', 'en'];
            break;
        case 'ir':
            $conjugacion = ['o', 'es', 'e', 'imos', 'is', 'en'];
            break;
    }
    $conjugado = [];
    $raiz = substr($verbo, 0, -2);
    foreach($conjugacion as $c) {
        $conjugado[] = $raiz . $c;
    }
    
    return <<<HTML
        <select>
            <option value="{$conjugado[0]}">{$conjugado[0]}</option>
            <option value="{$conjugado[1]}">{$conjugado[1]}</option>
            <option value="{$conjugado[2]}">{$conjugado[2]}</option>
            <option value="{$conjugado[3]}">{$conjugado[3]}</option>
            <option value="{$conjugado[4]}">{$conjugado[4]}</option>
            <option value="{$conjugado[5]}">{$conjugado[5]}</option>
        </select>
    HTML;
}

function conjugacion($verbo) {
    $conjugacion  = substr($verbo, -2);
    $conjugaciones = [
            'ar' => 1,
            'er' => 2,
            'ir' => 3
    ];
    return $conjugaciones[$conjugacion];
}
?>