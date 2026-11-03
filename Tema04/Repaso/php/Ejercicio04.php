<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
</head>
<body>
    <h1>Lista de deseos con cookies</h1>
    <form action="/php/Ejercicio04.php" method="POST">
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
if(!isset($_POST['nombre']) || !isset($_POST['precio']) || !isset($_POST['prioridad'])) exit();

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$prioridad = $_POST['prioridad'];

$producto = [$precio, $prioridad];
if(!isset($_COOKIE['productos'])) setcookie('productos', json_encode([]));
$productos = json_decode($_COOKIE['productos'], true);
$productos[$nombre] = $producto;
setcookie('productos', json_encode($productos));
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
foreach( $productos as $k => $p) {
    $html .= <<<PRODUCT
        <tr>
            <td>$k</td>
            <td>$p[0]</td>
            <td>$p[1]</td>
        </tr>
    PRODUCT;
}

$html .= '</tbody></table>';
echo $html;
?>
</body>
</html>