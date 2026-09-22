<?php
    const WORD = 'Si eres un vibecoder eres tonto y seguiras siendo tonto si solo programas con IA, que eres tonto';
    const BANNED_WORDS = 'tonto';

    $arrWord = explode(' ', WORD);
    foreach($arrWord as $w) {
        $w == BANNED_WORDS ? print('*****' . ' ') : print($w . ' ');
    }
?>