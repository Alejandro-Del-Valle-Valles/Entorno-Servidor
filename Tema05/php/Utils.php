<?php
function connectDB($schema = 'test', $user = 'root', $pwd = '', $host = '127.0.0.1') {
    try {
        $dsn = "mysql:host=$host;dbname=$schema";
        return new PDO($dsn, $user, $pwd);
    } catch(PDOException $ex) {
        print('No se ha podido conectar a ' . $schema . ' Error: ' . $ex->getMessage());
        die();
    }
}
?>