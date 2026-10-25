<?php
//Author Lua DeVV
const SALUDATIONS = ['Hola ', 'Qué tal estás ', '¡¡Que pasa '];
const HEADER = ['h1', 'h2', 'h3'];

$result = isset($_GET['name']) ? buildSaludation($_GET['name']) : "No has introducido un nombre.";
echo $result;

function buildSaludation($name) {
    $header = HEADER[array_rand(HEADER)];
    $saludation = SALUDATIONS[array_rand(SALUDATIONS)];
    return "<$header>$saludation $name</$header>";
}
?>