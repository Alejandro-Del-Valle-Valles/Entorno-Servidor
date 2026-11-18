<?php
require_once '../../lib/rb.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $persona = R::load('persona', $id);
    R::trash($persona);
}

header('Location: indexPersonas.php');
?>