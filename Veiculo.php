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

// Corrigido o nome da classe para "Carro" e adicionado um construtor
class Carro extends Veiculo {
    public function ligarLimpador() {
        echo "Limpando em 321";
    }
}

// Corrigido o nome da classe para "Moto" e adicionado um construtor
class Moto extends Veiculo {
    public function darGrau() {
        echo "Dando grau em 321";
    }
}

// Instanciando e configurando um objeto da classe Carro
$carro = new Carro();
$carro->placa = "jjj0099";
$carro->modelo = "chevette";
$carro->cor = "bege";
$carro->ano = "1979";
$carro->Andar();
echo "<br>";
$carro->ligarLimpador();
var_dump($carro);

// Instanciando e configurando um objeto da classe Moto
$moto = new Moto();
$moto->placa = "jkk0099";
$moto->modelo = "honda PCX";
$moto->cor = "cinza";
$moto->ano = "2023";
$moto->Parar(); // Corrigido o nome do método para "Parar"
echo "<br>";
$moto->darGrau();
var_dump($moto);
