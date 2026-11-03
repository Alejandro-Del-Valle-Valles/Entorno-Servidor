<?php
setcookie('Datos', 'Valor'); //Almacena con el nombre 'Datos' el string 'Valor;
$_COOKIE['Datos']; //Obtiene el valor de 'Datos'
$array = ['Valor 1', 'Valor 2', 'Valor 3'];
setcookie('Array', json_encode($array)); //Almacea un array
json_decode($_COOKIE['Array'], true) //Devuelve el array almacenado
?>