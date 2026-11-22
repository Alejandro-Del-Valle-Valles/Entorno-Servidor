<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$persona = null;
$isUpdate = isset($_GET['id']);
if($isUpdate) {
    $persona = R::load('persona', $_GET['id']);
}
$paises = R::findAll('pais');
$aficiones = R::findAll('aficion');
R::aliases(['vive' => 'pais', 'nace' => 'pais']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear | Actualizar Persona</title>
</head>
<body>
    <h1>Crear | Atualizar Persona</h1>
    <form action="createUpdatePersona.php" method="POST">
        <input type="text" name="id" value="<?= $isUpdate ? $persona->id : '' ?>" hidden>
        <lable>
            Nombre<input type="text" name="nombre" value="<?= $isUpdate ? $persona->nombre : '' ?>"/><br>
        </lable>
        <lable>
            Apellido<input type="text" name="apellido" value="<?= $isUpdate ? $persona->apellido : '' ?>"/><br>
        </lable>
        <lable>
            Teléfono<input type="text" name="telefono" value="<?= $isUpdate ? $persona->tlf : '' ?>"/><br>
        </lable>

        <label>
            País de Nacimiento:
            <select name="nace">
                <?php 
                    foreach($paises as $pais) {
                        if($isUpdate && $pais->id == $persona->fetchAs('pais')->nace->id) {
                            echo '<option value="' . $pais->id . '" selected>' . $pais->nombre . '</option>';
                        }
                        else {
                            echo '<option value="' . $pais->id . '">' . $pais->nombre . '</option>';
                        }
                    }
                ?>
            </select>
        </label>

        <label>
            País de Residencia:
            <select name="vive">
                <?php 
                    foreach($paises as $pais) {
                        if($isUpdate && $pais->id == $persona->fetchAs('pais')->vive->id) {
                            echo '<option value="' . $pais->id . '" selected>' . $pais->nombre . '</option>';
                        }
                        else {
                            echo '<option value="' . $pais->id . '">' . $pais->nombre . '</option>';
                        }
                    }
                ?>
            </select>
        </label>

        //TODO Hacer la parte de aficiones
        <fieldset>
            Aficiones que me gustan:
            <?php 
                foreach($aficiones as $aficion) {
                    if($isUpdate && $aficion->id == $persona->ownGustoList /*Ver como hacer esto*/) {
                        echo '<option value="' . $pais->id . '" selected>' . $pais->nombre . '</option>';
                    }
                    else {
                        echo '<option value="' . $pais->id . '">' . $pais->nombre . '</option>';
                    }
                }
            ?>
        </fieldset>
    </form>
    <button onclick="window.location.href='indexPersonas.php';">Volver</button>
</body>
</html>