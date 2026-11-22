<?php
include_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$pais;
$id = $_POST['id'];
$nombre = $_POST['nombre'];
if($id != '') $pais = R::load('pais', $id);
else $pais = R::dispense('pais');
$pais->nombre = $nombre;
R::store($pais);
header('Location: indexPaises.php');
?>