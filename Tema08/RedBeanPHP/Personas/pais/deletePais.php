<?php
require_once '../../lib/rb.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    $pais = R::load('pais', $id);
    R::trash($pais);
}

header('Location: indexPaises.php');
?>