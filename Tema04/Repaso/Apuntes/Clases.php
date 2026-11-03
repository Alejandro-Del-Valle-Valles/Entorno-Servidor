<?php
class ClaseEjemplo {
    private $atributo = 'valor por defecto';

    public function __construct($valor) {
        $this->atributo = $valor;
    }

    public static function saludar() {
        echo 'Hola';
    }

    function saludarClase() {
        echo 'Hola ' . $this->atributo;
    }
}

ClaseEjemplo::saludar(); //Estático
$clase = new ClaseEjemplo('Lua');
$clase->saludarClase(); //De instancia
?>