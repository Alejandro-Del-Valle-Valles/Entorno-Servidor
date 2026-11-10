<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
<?php
    require_once '../lib/rb.php';
    if(!isset($_POST['action']) || !isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['tlf'])) die();

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tlf = $_POST['tlf'];
    $action = $_POST['action'];

    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    
    $person = R::dispense('person');
    if($action == 'Borrar') {
        R::trash($person);
    } else {
        if($id > 0) $person->id = $id;
        $person->name = $name;
        $person->surname = $surname;
        $person->tlf = $tlf;

        R::store($person);
    }
    $persons = R::findAll('person');

    $html = <<<HTML
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Actualizar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
    HTML;

    foreach($persons as $p) {
        $i = $p->id;
        $n = $p->name;
        $s = $p->surname;
        $t = $p->tlf;
        $html .= <<<DATA
            <tr>
                <td>$n</td>
                <td>$s</td>
                <td>$t</td>
                <td>
                    <form action="Ejercicio00.php" method="GET">
                        <input type="hidden" name="id" value="$i">
                        <input type="hidden" name="name" value="$n">
                        <input type="hidden" name="surname" value="$s">
                        <input type="hidden" name="tlf" value="$t">
                        <input type="submit" value="Actualizar">
                    </form>
                </td>
                <td>
                    <form action="Ejercicio00_list.php" method="POST">
                        <input type="hidden" name="id" value="$i">
                        <input type="submit" name="action" value="Borrar">
                    </form>
                </td>
            </tr>
        DATA;
    }

    $html .= '</tbody></table>';
    echo $html;
    R::close();
?>
</body>
</html>