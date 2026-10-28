<?php
include_once 'Utils.php';
//Tengo que pensar com ohacer esto para tener persistencia de lo que el user guarde antes de insertar
header('Context-Type: text/xml; charset=utf-8');

session_start();
if(!isset($_GET['name']) && !isset($_GET['price'])) exit();

$db = connectDB();
$data = [$_GET['name'], $_GET['price']];

$message = '';
try {
    $stmt = $db->prepare('INSERT INTO producto (nombre, precio) VALUES (?, ?)');
    $stmt->execute($data);

    $message = 'Insertado correctamente';
} catch(PDOException $ex) {
    $message = 'Error al insertar';
}

echo <<<XML
    <?xml version="1.0" encoding="UTF-8"?>
    <data>
        <message>$message</message>;
    </data>
    XML;
?>