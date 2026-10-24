<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumando</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['addends'])) {
    $_SESSION['addends'] = 0;
    $_SESSION['numbers'] = [];
} else {
    $_SESSION['addends']++;
}

$_SESSION['numbers'][] = $_GET['number'];
if($_SESSION['addends'] >= $_GET['addends']) header('Location: Sumar03.php');

$addend = $_SESSION['addends'] + 1;
$addends = $_GET['addends'];
echo <<<HTML
<form action="">
Sumando $addend : <input type="number" name="number" required><br>
<input type="submit" value="Enviar">
<input type="number" name="addends" value="$addends" hidden>   
</form>
HTML;
?>
</body>
</html>