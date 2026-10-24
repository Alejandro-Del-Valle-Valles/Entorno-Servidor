<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Introduce un verbo</h1>
    <form action="index.php">
        <input type="text" name="verbo">
        <input type="submit" value="Más verbos" name="accion">
        <input type="submit" value="Conjugar" name="accion">
    </form>
<?php
include_once 'utils.php';
session_start();
if(isset($_GET['verbo']) && isset($_GET['accion']) && $_GET['accion'] == 'Más verbos') {
    if(!isset($_SESSION['verbos'])) $_SESSION['verbos'] = [];
    $_SESSION['verbos'][] = trim($_GET['verbo']);
}

if(isset($_GET['accion']) && $_GET['accion'] == 'Conjugar') header('Location:mostrarVerbos.php');
?>
</body>
</html>