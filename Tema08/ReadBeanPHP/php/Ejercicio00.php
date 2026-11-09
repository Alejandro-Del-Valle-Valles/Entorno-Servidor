<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
<?php
    require_once '../lib/rb.php';

    if(!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['tlf'])) die();

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tlf = $_POST['tlf'];

    //Falta conectar, guardar, obtener y mostra
?>
</body>
</html>