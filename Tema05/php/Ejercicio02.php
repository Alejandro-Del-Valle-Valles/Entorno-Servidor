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
    </form><br>
</body>
</html>

<?php
include_once 'Utils.php';
session_start();
session_destroy();
$db = connectDB();
if(!isset($_POST['name']) && !isset($_POST['price'])) {
    echo createTable($db);
    exit();  
} 

$data = [$_POST['name'], $_POST['price']];

try {
    $stmt = $db->prepare('INSERT INTO producto (nombre, precio) VALUES (?, ?)');
    $stmt->execute($data);
    if($data) { 
        echo createTable($db);
    } else {
        echo 'No se ha podido obtener los datos de la BBDD';
    }
} catch(PDOException $ex) {
    print('Error al insertar');
}

function createTable($db) {
    $stmt = $db->query('SELECT * FROM producto');
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $table = '<table>';
    foreach ($data as $line) {
        $table .= '<tr>'
            . '<td>' . htmlspecialchars($line['nombre']) . '</td>'
            . '<td>' . htmlspecialchars((string) $line['precio']) . '</td>'
            . '</tr>';
    }
    $table .= '</table>';

    return $table;
}
?>