<?php
session_start();
foreach($_GET as $k => $v) $_SESSION[$k] = $v;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Parte 2</title>
</head>
<body>
    <h1>2</h1>
    <form action="Ejercicio07_03.php">
        <fieldset>
            <legend>Datos Profesionales</legend>
            Departamento:
            <select name="department" required>
                <option value="marketing">Marketing</option>
                <option value="ventas">Ventas</option>
                <option value="rrhh">RRHH</option>
                <option value="direccion">Dirección</option>
                <option value="desarrollo">Desarrollo</option>
            </select><br>
            Salario: <input type="number" name="salary" required><br>
            Comentario: <textarea name="comment"></textarea>
        </fieldset>
        <input type="submit" value="Guardar y pasar al siguiente apartado">
    </form>
</body>
</html>