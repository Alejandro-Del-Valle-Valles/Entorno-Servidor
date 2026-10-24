<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumar números</title>
</head>
<body>
<?php 
session_start();
session_destroy();
session_start();
?>
    <form action="Sumar02.php">
        Introduce el sumando: <input type="number" min="2" max="15" name="addends" required><br>
        <input type="submit" value="Sumar">
    </form>
</body>
</html>