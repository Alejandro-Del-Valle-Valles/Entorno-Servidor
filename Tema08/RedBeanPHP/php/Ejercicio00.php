<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
</head>
<body>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$name = isset($_GET['name']) ? $_GET['name'] : '';
$surname = isset($_GET['surname']) ? $_GET['surname'] : '';
$tlf = isset($_GET['tlf']) ? $_GET['tlf'] : '';

echo <<<HTML
    <form action="Ejercicio00_list.php" method="POST">
        <input type="hidden" name="id" value="$id">
        Nombre: <input type="text" name="name" value="$name" required><br>
        Apellido: <input type="text" name="surname" value="$surname" required><br>
        Teléfono: <input type="tel" name="tlf" value="$tlf" required><br>
        <input type="submit" name="action" value="Enviar">
    </form>
HTML;
?>
</body>
</html>