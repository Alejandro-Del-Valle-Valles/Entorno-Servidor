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
    if(!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['tlf'])) die();

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tlf = $_POST['tlf'];

    R::setup('mysql:host=localhost;dbname=test', 'root', '');
    
    $person = R::dispense('person');
    $person->name = $name;
    $person->surname = $surname;
    $person->tlf = $tlf;

    R::store($person);
    $persons = R::findAll('person');

    $html = <<<HTML
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
    HTML;

    foreach($person as $p) {
        $n = $p->name;
        $s = $p->surname;
        $t = $p->tlf;
        $html .= <<<DATA
            <tr>
                <td>$n</td>
                <td>$s</td>
                <td>$t</td>
            </tr>
        DATA;
    }

    $html .= '</tbody></table>';
    echo $html;
    R::close();
?>
</body>
</html>