<form action="Ejercicio18_03.php">
    Selecciona una opción
    <?php
        const NUMBERS_NAME = ['Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve', 'Diez', 'Once', 'Doce', 'Trece', 'Catorce', 'Quince'];
        $number = (int) $_GET['number'];
        for($i = 0; $i < $number; $i++) {
            $num = NUMBERS_NAME[$i];
            $value = $i + 1;
            echo "<input type='radio' name='number_two' value='$value' id='$num'>";
            echo "<label for='$num'>$num</label><br>";
        }
        echo "<input type='hidden' name='number' value='$number'>";
    ?>
    <input type="submit" value="Enviar"><br>
</form>