<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
<?php
session_start();
$result = 0;
foreach($_SESSION['numbers'] as $n) {
    $result += $n;
}
$operation = implode(' + ', $_SESSION['numbers']);
echo "El resultado es $operation = $result<br>";
echo '<a href="Sumar01.php">Volver</a>';
?>
</body>
</html>