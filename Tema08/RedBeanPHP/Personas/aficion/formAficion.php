<?php
include_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$aficion = null;
$isUpdate = isset($_GET['id']);
if($isUpdate) {
    $aficion = R::load('aficion', $_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Crear | Actualizar Aficion</title>
</head>
<body>
    <h1>Crear | Actualizar Aficion</h1>
    <form action="createUpdateAficion.php" method="POST">
        <label>
            <input type="number" name="id" value="<?= $isUpdate ? $aficion->id : '' ?>" hidden>
            Nombre: <input type="text" name="nombre" value="<?= $isUpdate ? $aficion->nombre : '' ?>" required>
        </label><br>
        <input type="submit" value="Crear">
    </form><br>
    <button onclick="window.location.href='indexAficiones.php';">Volver</button>
</body>
</html>
<!-- Author: Lua DeVV -->