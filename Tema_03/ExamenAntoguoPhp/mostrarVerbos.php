<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verbos</title>
</head>
<body>
    <h1>Lista de Verebos</h1>
    <table>
        <thead>
            <tr>
                <th>Infinitivo</th>
                <th>Conjugación</th>
                <th>Presente del indicativo</th>
            </tr>
        </thead>
        <tbody>
<?php
include_once 'utils.php';
session_start();
if(isset($_SESSION['verbos'])) {
    foreach($_SESSION['verbos'] as $verbo) {
        echo "<tr>";
        echo "<td>$verbo</td>";
        echo '<td>' . conjugacion($verbo) . '</td>';
        echo '<td>' . conjugar($verbo) . '</td>';
        echo "</tr>";
    }
}
?>
        </tbody>
    </table>
    <button onclick="window.location.href='index.php'">Volver al inicio</button>
</body>
</html>