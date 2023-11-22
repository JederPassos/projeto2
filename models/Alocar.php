<?php

require_once '../Conexao.php';

class Alocar extends ConexaoMySQL {
    public $Funcionario_id;
    public $Ordem_Servico_id;

    public function __construct($Funcionario_id, $Ordem_Servico_id) {
        $this->Funcionario_id = $Funcionario_id;
        $this->Ordem_Servico_id = $Ordem_Servico_id;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para alocar um funcionário a uma ordem de serviço
    public function alocarFuncionario($Funcionario_id, $Ordem_Servico_id) {
        $query = "INSERT INTO Alocar (Funcionario_id, Ordem_Servico_id) VALUES ($Funcionario_id, $Ordem_Servico_id)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os funcionários alocados para uma ordem de serviço
    public function obterFuncionariosAlocados($Ordem_Servico_id) {
        $query = "SELECT * FROM Alocar WHERE Ordem_Servico_id = $Ordem_Servico_id";
        $result = $this->conexao->query($query);

        $alocacoes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $alocacao = new Alocar($row['Funcionario_id'], $row['Ordem_Servico_id']);
                $alocacoes[] = $alocacao;
            }
        }

        return $alocacoes;
    }

    // Método para desalocar um funcionário de uma ordem de serviço
    public function desalocarFuncionario($Funcionario_id, $Ordem_Servico_id) {
        $query = "DELETE FROM Alocar WHERE Funcionario_id = $Funcionario_id AND Ordem_Servico_id = $Ordem_Servico_id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
