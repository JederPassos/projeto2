<?php


class Funcionario {
    public $nome;
    private $codigo;
    private $cpf;

    // Construtor para inicializar os atributos
    public function __construct($nome, $codigo, $cpf) {
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->cpf = $cpf;
    }

    public function Lavou() {
        echo $this->nome . " lavou <br>";
    }

    // Getter para o código
    public function getCodigo() {
        return $this->codigo;
    }

    // Setter para o código
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    // Getter para o CPF
    public function getCPF() {
        return $this->cpf;
    }

    // Setter para o CPF
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }
}

// Exemplo de instância e uso da classe Funcionario
$funcionario = new Funcionario("João", 123, "123.456.789-01");
$funcionario->Lavou();

// Exemplo de uso de getters e setters
echo "Código do Funcionário: " . $funcionario->getCodigo() . "<br>";
echo "CPF do Funcionário: " . $funcionario->getCPF() . "<br>";
$funcionario->setCodigo(456);
$funcionario->setCPF("987.654.321-00");
echo "Novo Código do Funcionário: " . $funcionario->getCodigo() . "<br>";
echo "Novo CPF do Funcionário: " . $funcionario->getCPF() . "<br>";


?>