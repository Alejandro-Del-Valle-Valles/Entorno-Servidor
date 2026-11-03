<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <h1>Lista de Deseos con Sesiones</h1>
    <form action="/php/Ejercicio05.php" method="POST">
        Introduce el nombre: <input type="text" name="nombre" required><br>
        Introduce el precio: <input type="number" name="precio" min="0" value="0" required><br>
        Introduce la prioridad: <select name="prioridad">
            <option value="baja" selected>Baja</option>
            <option value="media">Media</option>
            <option value="alta">Alta</option>
        </select><br>
        <input type="submit" value="Añadir deseo">
    </form>
    <h2>Deseos</h2>
<?php
session_start();
if(!isset($_POST['nombre']) || !isset($_POST['precio']) || !isset($_POST['prioridad'])) exit();

$nombre = $_POST['nombre'];
$producto = [$_POST['precio'], $_POST['prioridad']];
if(!isset($_SESSION['productos'])) $_SESSION['productos'] = [];
$_SESSION['productos'][$nombre] = $producto;

$html = <<<HTML
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Prioridad</th>
            </tr>
        </thead>
        <tbody>
HTML;
foreach($_SESSION['productos'] as $n => $p) {
    $html .= <<<PRODUCTO
        <tr>
            <td>$n</td>
            <td>$p[0]</td>
            <td>$p[1]</td>
        </tr>
    PRODUCTO;
}

$html .= '</tbody></table>';
echo $html;
?>
</body>
</html>