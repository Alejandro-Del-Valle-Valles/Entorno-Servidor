<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['content'])) {
    $level = $_POST['level'] ?? '0';
    $cookieKey = 'level' . $level;

    $content = [];
    if (isset($_COOKIE[$cookieKey])) {
        $decoded = json_decode($_COOKIE[$cookieKey], true);
        if (is_array($decoded)) $content = $decoded;
    }
    $content[$_POST['name']] = $_POST['content'];
    setcookie($cookieKey, json_encode($content), time() + 86400, '/');
    $_COOKIE[$cookieKey] = json_encode($content);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
</head>
<body>
    <h1>Listado de Cookies por Nivel</h1>
    <ul>
        <li>Nivel 0 -> <a href="Ejercicio03_00.php">Listado de cookies</a></li>
        <li>Nivel 0 -> Nivel 1 -> <a href="Ejercicio03_01.php">Listado de cookies</a></li>
        <li>Nivel 0 -> Nivel 1 -> Nivel 2 -> <a href="Ejercicio03_02.php">Listado de cookies</a></li>
    </ul>

    <h2>Creación de cookies en diferentes niveles por un script</h2>
    <h3>Se permite fijar nombre y contenido de la cookie, así como el nivel</h3>
    <form action="" method="POST">
        <fieldset>
            <legend>Creación de Cookie</legend>

            <label for="name">Nombre: </label>
            <input type="text" id="name" name="name" required>

            <label for="content">Contenido: </label>
            <input type="text" id="content" name="content" required><br>

            <label for="level">Nivel: </label>
            <select id="level" name="level">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <input type="submit" value="Crear Cookie" id="create">
        </fieldset>
    </form>
</body>
</html>