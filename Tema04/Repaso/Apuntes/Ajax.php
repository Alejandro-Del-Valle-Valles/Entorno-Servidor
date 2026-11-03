<?php
header('Content-Type: application/xml; charset=utf-8'); //Para indicar que pasamos un XML
$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<data>
    <nombre>Lua</nombre>
    <edad>20</edad>
    <genero>Femenino</genero>
</data>
XML; //Formato para enviar datos mediante XML

//SI ENVIAMOS HTML PURO
//No añadimos el header
echo <<<HTML
    <h1>Respuesta HTML directamente</h1>
HTML;

//PARA RELOCALIZAR A OTRA PÁGINA
header('Location:ejemplo.php');
?>