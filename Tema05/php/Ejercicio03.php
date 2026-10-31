<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
</head>
<body>
    <form action="Ejercicio03.php" method="POST">
        <h1>Añadir productos</h1>
        Nombre: <input type="text" name="name" required><br>
        Precio: <input type="text" name="price" required><br>
        <input type="submit" value="Insertar" name="action">
        <input type="submit" value="Preparar" name="action">
    </form><br>
</body>
</html>

<?php
include_once 'Utils.php';
session_start();
$db = connectDB();

$data = [$_POST['name'], $_POST['price']];

if(isset($_POST['action']) && isset($_POST['name']) && isset($_POST['price'])) {
    if($_POST['action'] == 'Insertar') {
        insertData($db, $data);
        unset($_SESSION['prepared']);
    }
    else prepareData($data);
}
createTable($db);

function insertData($db, $data) {
    try {
        $stmt = $db->prepare('INSERT INTO producto (nombre, precio) VALUES (?, ?)');
        $stmt->execute($data);
        if(!$data) echo 'No se ha podido insertar los datos de la BBDD';
    } catch(PDOException $ex) {
        print('Error al insertar');
    }
}

function prepareData($data) {
    if(!isset($_SESSION['prepared'])) $_SESSION['prepared'] = [];
    $_SESSION['prepared'][] = $data;
}

function createTable($db) {
    $stmt = $db->query('SELECT * FROM producto');
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = '<h1>Insertados</h1><table>'
    . '<thead><tr><th>Nombre</th><th>Precio</th></tr></thead><tbody>';
    foreach ($data as $line) {
        $html .= '<tr>'
            . '<td>' . htmlspecialchars($line['nombre']) . '</td>'
            . '<td>' . htmlspecialchars((string) $line['precio']) . '</td>'
            . '</tr>';
    }
    $html .= '</tbody></table>';

    if(isset($_SESSION['prepared'])) {
        $sessionData = $_SESSION['prepared'];
        $html .= '<h1>Preparados</h1><table>'
        . '<thead><tr><th>Nombre</th><th>Precio</th></tr></thead><tbody>';
        foreach ($sessionData as $d) {
            $html .= '<tr>'
                . '<td>' . htmlspecialchars($d[0]) . '</td>'
                . '<td>' . htmlspecialchars((string) $d[1]) . '</td>'
                . '</tr>';
        }
        $html .= '</tbody></table>';
    }

    return $html;
}
?>