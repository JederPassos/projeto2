<?php

Class Servico {
    public $orden_servico;
    public $situacao;
    public $descricao_servico;
    public $data;

    // Construtor para inicializar os atributos
    public function __construct($orden_servico, $situacao, $descricao_servico, $data) {
        $this->orden_servico = $orden_servico;
        $this->situacao = $situacao;
        $this->descricao_servico = $descricao_servico;
        $this->data = $data;
    }

    public function Fazer() {
        echo "Fez <br>";
    }
}

// Instanciando e configurando um objeto da classe Servico
$servico = new Servico("OS123", "Em andamento", "Manutenção de motor", "2023-01-01");
$servico->Fazer();

// Exemplo de acesso aos atributos após a instância
echo "Ordem de Serviço: " . $servico->orden_servico . "<br>";
echo "Situação: " . $servico->situacao . "<br>";
echo "Descrição do Serviço: " . $servico->descricao_servico . "<br>";
echo "Data: " . $servico->data . "<br>";

?>