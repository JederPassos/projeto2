<?php

class Veiculo {
    // Atributos comuns a Carro e Moto
    public $placa;
    public $modelo;
    public $cor;
    public $ano;

    // Método genérico para todos os veículos
    public function Andar() {
        echo "Andou";
    }
    
    public function Parar() {
        echo "Parou";
    }
}
