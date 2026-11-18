<?php
require_once '../../lib/rb.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $aficion = R::load('aficion', $id);
    R::trash($aficion);
}

header('Location: indexAficiones.php');
?>