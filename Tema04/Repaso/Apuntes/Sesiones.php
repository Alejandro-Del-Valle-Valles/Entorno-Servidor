<?php
session_start(); //Inicia o crea sesión si no está creada.
session_abort(); //Cierra sesión
session_destroy(); //Elimina la sesión con todos sus datos
session_id(); //ID de la sesión

$_SESSION['datos'] = 'Ejemplo'; //Almacena el valor 'Ejemplo' en datos; 
$_SESISSION['datos']; //Almacena con el nombre 'datos' los datos que queramos, puede ser de cualquier tipo, incluso array
unset($_SESISSION['datos']); //Eliminar un dato almacenado
?>