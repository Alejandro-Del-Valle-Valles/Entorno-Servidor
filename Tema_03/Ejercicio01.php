<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
</head>
<body>
<?php
if(isset($_COOKIE['uid'])) {
    $uid = $_COOKIE['uid'];
    echo "Hola de nuevo, te conozco como UID = $uid";
} else {
    echo "Hola desconocido, a partir de ahora te recordaré.";
    setcookie('uid', generateUID());
}

function generateUID($longitud = 5) { 
    $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $base = strlen($charset); 
    $result = '';
    $now = explode(' ', microtime())[1];
    while ($now >= $base){
        $i = $now % $base;
        $result = $charset[$i] . $result;
        $now /= $base;
    }
    return substr($result, -5);
}
?>
</body>
</html>