<?php

class ConexaoMySQL {
    public $host = "localhost";
    public $usuario = "root";
    public $senha = "";
    public $banco = "DB_oficial";
    public $conexao;

 
    public function __construct() {
        $this->conectar();
    }

    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Erro de conexão: " . $this->conexao->connect_error);
        }

        // Defina o conjunto de caracteres para UTF-8
        $this->conexao->set_charset("utf8");
    }

    public function fecharConexao() {
        $this->conexao->close();
    }

    // Método para obter a conexão, útil para consultas fora da classe
    public function obterConexao() {
        return $this->conexao;
    }
}
?>