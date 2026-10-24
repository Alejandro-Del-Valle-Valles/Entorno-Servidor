<?php
session_start();
foreach($_GET as $k => $v) $_SESSION[$k] = $v;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Parte 3</title>
</head>
<body>
    <h1>3</h1>
    <form action="Ejercicio07_04.php">
        <fieldset>
            <legend>Datos Bancarios</legend>
            Cuenta Corriente: <input type="text" name="account" required>
        </fieldset>
        <input type="submit" value="Guardar y finalizar">
    </form>
</body>
</html>