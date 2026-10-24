<?php
session_start();
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Parte 1</title>
</head>
<body>
    <h1>1</h1>
    <form action="Ejercicio07_02.php">
        <fieldset>
            <legend>Datos Personales</legend>
            Nombre: <input type="text" name="name" required>
            Apellidos: <input type="text" name="surname" required><br>
            Fecha de Nacimiento: <input type="date" name="bornDate" required><br>
            Género ->
            <input type="radio" name="gender" id="women">
            <label for="women">Mujer</label>
            <input type="radio" name="gender" id="men">
            <label for="men">Hombre</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Otro</label>
            <input type="radio" name="gender" id="ns" checked>
            <label for="ns">Ns/Nr</label><br>
            <select name="country">
                <option selected value="Española">Española</option>
                <option value="Francesa">Francesa</option>
                <option value="Portuguesa">Portuguesa</option>
                <option value="Italiana">Italiana</option>
                <option value="Alemana">Alemana</option>
            </select>
            </fieldset>
            <input type="submit" value="Guardar y pasar al siguiente apartado">
    </form>
</body>
</html>