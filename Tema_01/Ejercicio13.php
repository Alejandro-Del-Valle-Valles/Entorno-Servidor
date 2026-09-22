<?php
    const WORD = 'Si eres un vibecoder eres tonto y seguiras siendo tonto si solo programas con IA, que eres mongoloclear';
    const BANNED_WORDS = ['tonto', 'TONTO', 'mongolo'];

    $arrWord = explode(' ', WORD);
    foreach($arrWord as $w) {
        in_array($w, BANNED_WORDS) ? print('*****' . ' ') : print($w . ' ');
    }
?>