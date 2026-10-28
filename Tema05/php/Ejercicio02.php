<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <form action="Ejercicio02.php" method="POST">
        <h1>Añadir productos</h1>
        Nombre: <input type="text" name="name" required><br>
        Precio: <input type="text" name="price" required><br>
        <input type="submit" value="Insertar" id="insert">
    </form>
    
    </table>   
</body>
</html>

<?php
include_once 'Utils.php';

session_start();
if(!isset($_POST['name']) && !isset($_POST['price'])) exit();

$db = connectDB();
$data = [$_POST['name'], $_POST['price']];

try {
    $stmt = $db->prepare('INSERT INTO producto (nombre, precio) VALUES (?, ?)');
    $stmt->execute($data);
    print('Insertado correctamente');
} catch(PDOException $ex) {
    print('Error al insertar');
}
?>