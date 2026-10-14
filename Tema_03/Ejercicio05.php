<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['counter'])) $_SESSION['counter']++;
else $_SESSION['counter'] = 1;
$visits = $_SESSION['counter'];
echo "Has visitado la página $visits veces";
?>
</body>
</html>