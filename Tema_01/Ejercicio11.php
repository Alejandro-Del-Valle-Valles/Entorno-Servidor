<?php
    $information = explode('//', 'Alejandro:Valle:9816782//Aurora:Hoyo:91837483//Marcos:Alvarez:18283983');

    foreach($information as $d) {
        $data = explode(':', $d);
        echo "Nombre: $data[0]\n";
        echo "Apellido: $data[1]\n";
        echo "Teléfono: $data[2]\n";
        echo "-------\n";
    }
?>