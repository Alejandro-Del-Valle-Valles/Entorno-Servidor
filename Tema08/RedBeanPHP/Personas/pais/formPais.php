<?php
    require_once '../../lib/rb.php';
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $pais = null;
    $isUpdate = isset($_GET['id']);
    if($isUpdate) {
        $pais = R::load('pais', $_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Crear | Actualizar País</title>
</head>
<body>
    <h1>Crear | Actualizar País</h1>
    <form action="createUpdatePais.php" method="POST">
        <input type="text" name="id" value="<?= $isUpdate ? $_GET['id'] : '' ?>" hidden>
        <lable>
            Nombre: <input type="text" name="nombre" value="<?= $isUpdate ? $pais->nombre : '' ?>">
        </lable><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<!-- Author: Lua DeVV -->