<?php
header('Content-Type: text/xml; charset=utf-8');

const LANGUAGES = [
    'spanish' => ['Palabra', 'Traducción', 'Enviar'],
    'english' => ['Word', 'Translation', 'Send'],
    'french' => ['Mot', 'Traditionnel', 'Envoyer']
    ];

$lang = isset($_GET['language']) ? trim($_GET['language']) : '';
if(array_key_exists($lang, LANGUAGES)) {
    $words = LANGUAGES[$lang];
    echo <<<XML
    <?xml version="1.0" encoding="UTF-8"?>
    <data>
        <word>{$words[0]}</word>
        <translation>{$words[1]}</translation>
        <show>{$words[2]}</show>
    </data>
    XML;
}
?>