<?php
if(!isset($_POST['tarea']) || !isset($_POST['prioridad'])) die();

$tarea = $_POST['tarea'];
$prioridad = $_POST['prioridad'];
echo <<<HTML
    <tr>
        <td>$tarea</td>
        <td>$prioridad</td>
    </tr>
HTML;
?>