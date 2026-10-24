<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 08</title>
</head>
<body>
    <h1>Bienvenido!</h1>
    <p>Para empezar, introduce una letra.</p><br><br>
    <form action="Ejercicio08.php">
        Introduce una letra: <input type="text" min="1" max="1" width="30px" name="key" required>
        <input type="submit" value="Probar letra">
    </form>
<?php
session_start();
if(!isset($_SESSION['word'])) {
    $words = ['mochila', 'pantalla', 'raton', 'ventana', 'comida'];
    $_SESSION['word'] = $words[array_rand($words)];
}
if(!isset($_SESSION['keys'])) $_SESSION['keys'] = [];
if(isset($_GET['key'])) {
    $keyInWord = checkKey();
    if($keyInWord == null) {
        echo 'Ya has introducido esa letra antes.<br>';
    } else if (!$keyInWord) {
        if(!isset($_SESSION['fails'])) $_SESSION['fails'] = 0;
        $_SESSION['fails']++;
    }
    if(!isset($_SESSION['trys'])) $_SESSION['trys'] = 0;
    $_SESSION['trys']++;
}
printData();

function checkKey() {
    $key = $_GET['key'];
    if(in_array($key, $_SESSION['keys'])) return null;
    $word = $_SESSION['word'];
    for($i = 0; $i < mb_strlen($word); $i++) {
        if($word[$i] == $key) $_SESSION['keys'][$i] = $key;
    }
    return str_contains($word, $key);
}

function printData() {
    $word = $_SESSION['word'];
    for($i = 0;$i < mb_strlen($word); $i++) {;
        $key = $_SESSION['keys'][$i];
        if($key == $word[$i]) echo $key;
        else echo '-';
    }

    echo <<<HTML
        <b>Número de intentos: </b>{$_SESSION['trys']}<br>
        <b>Número de fallos: </b>{$_SESSION['fails']}<br>
    HTML;
}
?>
</body>
</html>