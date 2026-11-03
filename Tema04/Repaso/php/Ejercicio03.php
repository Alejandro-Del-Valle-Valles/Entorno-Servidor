<?php
header('Content-Type: application/xml; charset=utf-8');

if(!isset($_POST['producto']) && !isset($_POST['precio']) && !isset($_POST['prioridad'])) die();
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$prioridad = $_POST['prioridad'];
echo <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<data>
    <producto>$producto</producto>
    <precio>$precio</precio>
    <prioridad>$prioridad</prioridad>
</data>
XML;
?>