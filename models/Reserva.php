<?php


class Reserva {
    private $placa; // Corrigido o nome do atributo para começar com letra minúscula
    public $data;

    // Construtor para inicializar os atributos
    public function __construct($placa, $data) {
        $this->placa = $placa;
        $this->data = $data;
    }

    public function agendar() {
        echo "Agendou";
    }
}

// Instanciando e configurando um objeto da classe Reserva
$reserva = new Reserva("ABC123", "2023-01-01");
$reserva->agendar();

// Exemplo de acesso aos atributos após a instância
echo "Placa: " . $reserva->placa . "<br>";
echo "Data: " . $reserva->data . "<br>";

?>

    