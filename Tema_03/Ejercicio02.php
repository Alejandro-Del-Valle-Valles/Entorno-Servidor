<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
<?php
if(isset($_COOKIE['visit'])) {
    setcookie('visit', $_COOKIE['visit'] + 1);
    $visit = $_COOKIE['visit'];
    echo "Hola, esta es la vez número $visit que visitas esta página.";
} else {
    echo "Bienvenido.";
    setcookie('visit', 0);
}
?>
</body>
</html>