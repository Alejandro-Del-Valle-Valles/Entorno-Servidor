<?php
    $iniDate = mktime(0, 0, 0, 1, 1, 1971);
    $actualDateSeconds = time();

    $days = askDays();
    $month = askMonth();
    $year = askYear();
    echo calculateTime($days, $month, $year);

    function askDays() : int {
        $days = 0;
        do {
            $days = (int) readline('Día: ');
        } while($days < 1 || $days > 30);
        return $days;
    }

    function askMonth() : int {
        $month = 0;
        do {
            $month = (int) readline('Mes: ');
        } while($month < 1 || $month > 12);
        return $month;
    }

    function askYear() : int {
        global $actualDateSeconds;
        $year = 0;
        do {
            $year = (int) readline('Año: ');
        } while($year < 1970 || $year > (int)date('Y', $actualDateSeconds));
        return $year;
    }

    function calculateTime($day, $month, $year) {
        global $actualDateSeconds;
        $days = (int) date('d', $actualDateSeconds) - $day;
        $months = (int) date('m', $actualDateSeconds) - $month;
        $years = (int) date('Y', $actualDateSeconds) - $year;
        if($days < 0) $month = $months < 0 ? $months + 1 : $months - 1;
        $days = $days < 0 ? 30 + $days : $days;
        if($months < 0) $years -= 1;
        $months = $months < 0 ? 12 + $months : $months;

        echo "$days $months $years";
    }
?>