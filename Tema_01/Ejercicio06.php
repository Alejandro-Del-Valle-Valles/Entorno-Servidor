<?php
    const END_WORD = 'fin';
    $persons;
    $newPerson;
    $age;
    while(true) {
        $newPerson= readline('Introduce el nombre de la persona: ');
        if($newPerson == END_WORD) break;
        $age = (int) readline("Edad de $newPerson? ");
        $persons[$newPerson] = $age;
    };
    foreach($persons as $k => $v) {
        echo "$k ($v), ";
    }
?>