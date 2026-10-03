<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Carácter</th>
            <th>Código URL</th>
        </tr>
    <?php
        $char;
        $encoded;
        for($i = 0; $i < 255; $i++) {
            $char = chr($i);
            $encoded = urldecode($char);
            echo <<<HTML
            <tr>
                <td>$i</td>
                <td>$char</td>
                <td>$encoded</td>
            </tr>
            HTML;
        }  
    ?>
    </table>
</body>
</html>