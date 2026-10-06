<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
    <?php
        if(empty($_REQUEST)) {
            paintDefaultForm();
        } else {
            $errors = checkData();
            if(!$errors['name'] && !$errors['pwd']) paintSalutation();
            else paintDefaultForm($errors['name'], $errors['pwd']);
        }

        function paintDefaultForm($nameIncorrect = false, $pwdIncorrect = false) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
            $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : '';
            $nameError = $nameIncorrect ? '<p style="color: red">El nombre no puede estar vacio.</p><br>' : '';
            $pwdError = $pwdIncorrect ? '<p style="color: red">La contraseña no puede tener menos de 6 carateres y más de 12.</p><br>': '';
            echo <<<HTML
            <form action="Ejercicio15.php">
                Nombre: <input type="text" name="name" value="$name"required><br>$nameError
                Contraseña: <input type="password" name="pwd" value="$pwd" min="6" max="12" required><br>$pwdError
                <button>Enviar</button>
            </form>
            HTML;
        }

        function paintSalutation() {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'Desconocido';
            $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : 'Desconocida';
            echo "Hola $name, tu contraseña es $pwd";
        }

        function checkData() {
            $errors = [];
            $errors['name'] = isset($_REQUEST['name']) && empty(trim($_REQUEST['name']));
            $errors['pwd'] = isset($_REQUEST['pwd']) && 
                (mb_strlen(trim($_REQUEST['pwd'])) < 6 || mb_strlen(trim($_REQUEST['pwd'])) > 12);
            return $errors;
        }
    ?>
</body>
</html>