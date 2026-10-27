<?php
header('Content-Type: application/xml; charset=utf-8');
const DATA = [
    1 => ['Lua', 'Del Valle', '657 321 123'],
    2 => ['Juan', 'Delgado', '655 978 574'],
    3 => ['Pedro', 'Sanchez', '643 265 122'],
    4 => ['Felix', 'Rodriguez', '616 445 121'],
    5 => ['Marcos', 'García', '678 676 167']
];

if(isset($_GET['filter']) && isset($_GET['text'])) {
    $filter = $_GET['filter'];
    $text = $_GET['text'];
    $index = -1;
    switch($filter) {
        case 'name':
            $index = 0;
            break;
        case 'surname':
            $index = 1;
            break;
        case 'number':
            $index = 2;
            break;
    }
    if($index >= 0) echo searchOnData($index, $text);
}

/**
 *  Search the searched data on the DATA array
 * @param mixed $index Idex of the inner arrays to search
 * @param mixed $text Text to seacrh
 * @return string XML with the data
 */
function searchOnData($index, $text) {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<data>';

    if ($text !== '') {
        foreach (DATA as $p) {
            if (mb_stripos($p[$index], $text) !== false) {
                $xml .= '<person>';
                $xml .= '<name>' . htmlspecialchars($p[0], ENT_XML1) . '</name>';
                $xml .= '<surname>' . htmlspecialchars($p[1], ENT_XML1) . '</surname>';
                $xml .= '<number>' . htmlspecialchars($p[2], ENT_XML1) . '</number>';
                $xml .= '</person>';
            }
        }
    }
    $xml .= '</data>';
    return $xml;
}
?>