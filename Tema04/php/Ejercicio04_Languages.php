<?php
const LANGUAGES_LOGIN = [
    'es' => ['Nombre', 'Contraseña', 'Iniciar Sesión', 'El nombre o la contraseña son incorrectos'],
    'en' => ['Name', 'Password', 'Login', 'Name or password incorrect'],
];

const LANGUAGES_PLAY = [
    'es' => ['Introduce un número', 'Jugar', 'Tu número', 'Mi número', 'Lo siento, tu número es más bajo', 'Has ganado', 'Lo siento, tu número es más alto', 'Volver'],
    'en' => ['Enter a number', 'Play', 'Your number', 'My number', 'Sorry, your number is lower', 'You win', 'Sorry, your number is higher', 'Back'],
];

/**
 * Builds a valid XML document with the given content.
 * Built with echo-free string concatenation so no whitespace
 * can appear before the XML declaration.
 */
function xmlDocument(string $inner): string {
    return '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
        . '<data>' . $inner . '</data>';
}

/**
 * Returns the login error message in the selected language.
 */
function getLoginError(string $language = 'en'): string {
    $error = array_key_exists($language, LANGUAGES_LOGIN)
        ? LANGUAGES_LOGIN[$language][3]
        : 'The language is not supported';
    return xmlDocument('<error>' . htmlspecialchars($error) . '</error>');
}

/**
 * Returns the login labels in the selected language.
 */
function getLoginTranslation(string $language): string {
    if (array_key_exists($language, LANGUAGES_LOGIN)) {
        [$name, $pwd, $login] = LANGUAGES_LOGIN[$language];
        return xmlDocument(
            '<name>' . htmlspecialchars($name) . '</name>'
            . '<pwd>' . htmlspecialchars($pwd) . '</pwd>'
            . '<login>' . htmlspecialchars($login) . '</login>'
        );
    }
    return xmlDocument('<error>The language is not supported</error>');
}

/**
 * Returns the game labels in the selected language.
 */
function getGameTranslation(string $language): string {
    if (array_key_exists($language, LANGUAGES_PLAY)) {
        $keys = ['input', 'play', 'user', 'server', 'lower', 'win', 'higher', 'back'];
        $inner = '';
        foreach ($keys as $i => $key) {
            $inner .= "<$key>" . htmlspecialchars(LANGUAGES_PLAY[$language][$i]) . "</$key>";
        }
        return xmlDocument($inner);
    }
    return xmlDocument('<error>The language is not supported</error>');
}