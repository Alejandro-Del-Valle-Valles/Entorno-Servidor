<?php
    require_once '../../lib/rb.php';
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $aficiones = R::findAll('aficion');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Aficiones</title>
</head>
<body>
    <input type="button" name="acction" value="Crear Aficion" onclick="window.location.href='formAficion.php';"/>
    <table>
        <caption>Aficiones</caption>
        <thead>
            <th>Nombre</th>
            <th>Actualizar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            <?php foreach($aficiones as $aficion): ?>
                <tr>
                    <td><?= $aficion->nombre?></td>
                    <td><input type="button" name="action" value="Actualizar" onclick="window.location.href='formAficion.php?id=<?= $aficion->id ?>';"></td>
                    <td>
                        <form action="deleteAficion.php" method="POST">
                            <input type="number" name="id" value="<?= $aficion->id?>" hidden>
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <input type="button" value="Volver al menú" onclick="window.location.href='../menu.html'">
</body>
</html>
<!-- Author: Lua DeVV -->