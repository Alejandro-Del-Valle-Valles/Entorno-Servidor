<?php
    require_once '../../lib/rb.php';
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $paises = R::findAll('pais');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Paises</title>
</head>
<body>
    <input type="button" name="acction" value="Crear Pais" onclick="window.location.href='createUpdatePais.php';"/>
    <table>
        <caption>Paises</caption>
        <thead>
            <th>Nombre</th>
            <th>Actualizar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            <?php foreach($paises as $pais): ?>
                <tr>
                    <td><?= $pais->nombre?></td>
                    <td><input type="button" name="action" value="Actualizar" onclick="window.location.href='createUpdatePais.php?id=<?= $pais->id?>';"></td>
                    <td>
                        <form action="deletePais.php" method="POST">
                            <input type="number" name="id" value="<?= $pais->id?>" hidden>
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
<!-- Author: Lua DeVV -->