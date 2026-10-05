<!-- Ejercicio 09 -->
<?php

function resaltar($texto) {
    return "<h1>$texto</h1>";
}

function pintarRadio($nombre, $arrayValueLabel, $seleccionado) {
    $result = "";
    $checked = '';
    foreach($arrayValueLabel as $key => $value) {
        $checked = $key == $seleccionado ? 'checked' : '';
        $result .= "<input type='radio' name='$nombre' value='$key' id='$key' $checked>";
        $result .= "<label for='$key'>$value</label><br>";
    }
    return $result;
}

function pintarCheckBoxes($nombre, $arrayValueLabel, $seleccionados) {
    $result = "";
    $checked = '';
    foreach($arrayValueLabel as $key => $value) {
        $checked = in_array($key, $seleccionados) ? 'checked' : '';
        $result .= "<input type='checkbox' name='$nombre"."[]' value='$key' id='$key' $checked>";
        $result .= "<label for='$key'>$value</label><br>";
    }
    return $result;
}

function pintarSelect($arraySelectGroups) {
    $result = "<select>";
    foreach($arraySelectGroups as $name => $arr) {
        $result .= "<optgroup label='$name'>";
        foreach($arr as $key => $value) {
            $result .= "<option value='$key'>$value</option>";
        }
        $result .= "</optgroup>";
    }
    $result .= "</select>";
    return $result;
}

?>