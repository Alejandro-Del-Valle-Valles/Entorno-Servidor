<?php
include_once 'Ejercicio04_Languages.php';
header('Content-Type: text/xml; charset=utf-8');

const LOGIN = [
    'user' => 'Lua',
    'password' => '4', // Safe Password for PHP I Guess
];

if (isset($_GET['user']) && isset($_GET['password'])) {
    $lang = $_GET['language'] ?? 'en';

    if ($_GET['user'] !== LOGIN['user'] || $_GET['password'] !== LOGIN['password']) {
        echo getLoginError($lang);
        exit;
    }

    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<data><login>true</login></data>';
    exit;
}

if (isset($_GET['language'])) {
    echo getLoginTranslation($_GET['language']);
}