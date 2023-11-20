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

?>