<?php


class Tipo_de_lavagem {
    public $simples;
    public $geral;
    public $motor;

    // Construtor para inicializar os atributos
    public function __construct($simples, $geral, $motor) {
        $this->simples = $simples;
        $this->geral = $geral;
        $this->motor = $motor;
    }

    public function selecionar() {
        echo "Escolher";
    }
}

// Instanciando e configurando um objeto da classe Tipo_de_lavagem
$tipo_de_lavagem = new Tipo_de_lavagem("Lavagem Simples", "Lavagem Geral", "Manutenção de Motor");
$tipo_de_lavagem->selecionar();

// Exemplo de acesso aos atributos após a instância
echo "Lavagem Simples: " . $tipo_de_lavagem->simples . "<br>";
echo "Lavagem Geral: " . $tipo_de_lavagem->geral . "<br>";
echo "Manutenção de Motor: " . $tipo_de_lavagem->motor . "<br>";


?>