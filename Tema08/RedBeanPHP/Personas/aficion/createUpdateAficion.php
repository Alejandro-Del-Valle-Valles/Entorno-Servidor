<?php
include_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$aficion;
$id = $_POST['id'];
$nombre = $_POST['nombre'];
if($id != '') $aficion = R::load('aficion', $id);
else $aficion = R::dispense('aficion');
$aficion->nombre = $nombre;
R::store($aficion);
header('Location: indexAficiones.php');
?>