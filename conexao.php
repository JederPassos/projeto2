<?php
class ConexaoMySQL {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "lavajato";
    private $conexao;

    public function __construct() {
       
    }

    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }

    public function desconectar() {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }

    public function executarConsulta($sql) {
        if(!$resultado = $this->conexao->query($sql)){
            echo $this->conexao->error;
        }
        return $resultado;
    }

   
}
?>