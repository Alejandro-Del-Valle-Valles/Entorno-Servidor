<?php
    require_once '../../lib/rb.php';
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $personas = R::findAll('persona');
    R::aliases(['vive' => 'pais', 'nace' => 'pais']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Personas</title>
</head>
<body>
    <input type="button" name="acction" value="Crear Persona" onclick="window.location.href='formPersona.php';"/>
    <table>
        <caption>Personas</caption>
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>País de nacimiento</th>
            <th>País de residencia</th>
            <th>Gustos</th>
            <th>Odios</th>
            <th>Actualizar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            <?php foreach($personas as $persona): ?>
                <tr>
                    <td><?= $persona->nombre?></td>
                    <td><?= $persona->apellido?></td>
                    <td><?= $persona->tlf?></td>
                    <td><?= $persona->fetchAs('pais')->nace != null ? $persona->fetchAs('pais')->nace->nombre : '-' ?></td>
                    <td><?= $persona->fetchAs('pais')->vive != null ? $persona->fetchAs('pais')->vive->nombre : '-' ?></td>
                    <td>
                    <?php foreach ($persona->ownGustoList as $gusto): ?>
                        <?= $gusto->aficion->nombre . ' ' ?>
                    <?php endforeach; ?>
                    </td>

                    <td>
                        <?php foreach ($persona->ownOdioList as $odio): ?>
                            <?= $odio->aficion->nombre . ' ' ?>
                        <?php endforeach; ?>
                    </td>
                    <td><input type="button" name="action" value="Actualizar" onclick="window.location.href='formPersona.php?id=<?= $persona->id?>';"></td>
                    <td>
                        <form action="deletePersona.php" method="POST">
                            <input type="number" name="id" value="<?= $persona->id?>" hidden>
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