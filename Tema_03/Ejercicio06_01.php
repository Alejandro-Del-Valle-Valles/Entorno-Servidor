<?php
session_start();
session_destroy();
session_start();
$_SESSION['int'] = 67;
$_SESSION['real'] = 67.67;
$_SESSION['str'] = 'Six Seven';
$_SESSION['date'] = date_create('2026-10-19');
$_SESSION['traffic'] = ['r' => 'rojo', 'a' => 'amarillo', 'v' => 'verde'];
?>