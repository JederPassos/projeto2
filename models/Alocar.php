<?php

require_once 'Conexao.php';
require_once 'Funcionario.php';

class Alocar extends ConexaoMySQL
{
    public $Funcionario_id;
    public $Ordem_Servico_id;

    public function __construct()
    {
        parent::__construct();
    }

    // Método para alocar um funcionário a uma ordem de serviço
    public function alocarFuncionario($Funcionario_id, $Ordem_Servico_id)
    {
        $query = "INSERT INTO Alocar (Funcionario_id, Ordem_Servico_id) VALUES ($Funcionario_id, $Ordem_Servico_id)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os funcionários alocados para uma ordem de serviço
    public function obterFuncionariosAlocados($Ordem_Servico_id)
    {
        $query = "SELECT * FROM Alocar WHERE Ordem_Servico_id = $Ordem_Servico_id";
        $result = $this->conexao->query($query);

        $alocacoes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Instancia um objeto Alocar sem usar o construtor
                $alocacao = new Alocar();

                // Define as propriedades diretamente (sem o construtor)
                $alocacao->Funcionario_id = $row['Funcionario_id'];
                $alocacao->Ordem_Servico_id = $row['Ordem_Servico_id'];

                $alocacoes[] = $alocacao;
            }
        }

        return $alocacoes;
    }


    // Método para desalocar um funcionário de uma ordem de serviço
    public function desalocarFuncionario($Funcionario_id, $Ordem_Servico_id)
    {
        $query = "DELETE FROM Alocar WHERE Funcionario_id = $Funcionario_id AND Ordem_Servico_id = $Ordem_Servico_id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obterFuncionariosDisponiveis() {
        $query = "SELECT id, nome FROM Funcionario WHERE id NOT IN (SELECT Funcionario_id FROM Alocar)";
        $result = $this->conexao->query($query);

        $funcionariosDisponiveis = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $funcionario = new Funcionario($row['id'], $row['nome']);
                $funcionariosDisponiveis[] = $funcionario;
            }
        }

        return $funcionariosDisponiveis;
    }
}
