<?php
//header('Content-type: application/xml; charset=utf-8');

const IDIOMAS = [
    'es' => ['Cero', 'Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve', 'Diez'],
    'en' => ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eigth', 'Nine', 'Ten'],
    'de' => ['Zero', 'Ein', 'Zwei', 'Drei', 'Vier', 'Fünf', 'Sechs', 'Sieben', 'Acht', 'Neu', 'Zhen']
];

if(!isset($_GET['idioma']) || !isset($_GET['numero'])) die();

echo IDIOMAS[$_GET['idioma']][$_GET['numero']];
?>