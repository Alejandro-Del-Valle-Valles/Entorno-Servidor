<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
<?php
foreach($_GET as $k => $v) $_SESSION[$k] = $v;
session_start();
echo <<<HTML
    <!-- Personal Data -->
    <fieldset>
        <legend>Datos Personales</legend>
        <b>Nombre: </b>{$_SESSION['name']}
        <b>Apellidos: </b>{$_SESSION['surname']}
        <b>Fecha de Nacimiento: </b>{$_SESSION['bornDate']}
        <b>Género: </b>{$_SESSION['gender']}
        <b>Nacionalidades: </b>{$_SESSION['country']}
    </fieldset>

    <!-- Professional Data -->
    <fieldset>
        <legend>Datos Profesionales</legend>
        <b>Departamento: </b>{$_SESSION['department']}
        <b>Salario: </b>{$_SESSION['salary']}
        <b>Comentario: </b>{$_SESSION['comment']}
    </fieldset>

    <!-- Bank Data -->
     <fieldset>
        <legend>Datos Bancarios</legend>
        <b>Cuenta Corriente: </b>{$_SESSION['account']}
     </fieldset>
HTML;
?>
<a href="Ejercicio07_01.php">Volver al Inicio</a>
</body>
</html>