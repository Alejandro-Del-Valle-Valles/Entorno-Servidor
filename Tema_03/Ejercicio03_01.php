<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel 1</title>
</head>
<body>
    <h1>Listado de las cookies de nivel 1</h1>
<?php
if(isset($_COOKIE['level1'])) {
    echo <<<HTML
        <table>
            <tr>
                <th>Nombre</th>
                <th>Contenido</th>
            </tr>
    HTML;
    $data = json_decode($_COOKIE['level1'], true);
    foreach($data as $k => $v) {
        echo <<<HTML
            <tr>
                <td>$k</td>
                <td>$v</td>
            </tr>
        HTML;
    }
    echo "</table>";
} else {
    echo "No se han encontrado cookies de nivel 1";
}
?>
</body>
</html>