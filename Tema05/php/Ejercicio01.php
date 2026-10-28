<?php
include_once 'Utils.php';

define('INSERT', [['cocacola', 1.2], ['mejillones', 3.23], ['abrelatas', 1.41]]);

$db = connectDB();

try {
    $stmt = $db->prepare('INSERT INTO producto (nombre, precio) VALUES (?, ?)');
    foreach (INSERT as $data) {
        $stmt->execute($data);
    }
    print('Todo insertado correctamente');
} catch(PDOException $ex) {
    print('Error al ejecutar la sentencia: ' . $ex->getMessage());
    die();
}
?>