<?php
echo "<ul>";
    foreach($_GET['color'] as $key => $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
?>