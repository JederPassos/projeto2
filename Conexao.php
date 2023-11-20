<?php

class ConexaoMySQL {
    protected $host = "localhost";
    protected $usuario = "root";
    protected $senha = "";
    protected $banco = "lavajato";
    protected $conexao;

    public function __construct() {
        $this->conectar();
    }

    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Erro de conexão: " . $this->conexao->connect_error);
        }
    }

    public function fecharConexao() {
        $this->conexao->close();
    }
}
?>