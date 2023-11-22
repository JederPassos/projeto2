<?php

require_once '../Conexao.php';

class OrdemServico extends ConexaoMySQL {
    public $id;
    public $Data;
    public $Situacao;
    public $Descricao;
    public $Valor;
    public $id_veiculo;

    public function __construct($id, $Data, $Situacao, $Descricao, $Valor, $id_veiculo) {
        $this->id = $id;
        $this->Data = $Data;
        $this->Situacao = $Situacao;
        $this->Descricao = $Descricao;
        $this->Valor = $Valor;
        $this->id_veiculo = $id_veiculo;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar uma nova ordem de serviço
    public function criarOrdemServico($Data, $Situacao, $Descricao, $Valor, $id_veiculo) {
        $query = "INSERT INTO Ordem_Servico (Data, Situacao, Descricao, Valor, id_veiculo) VALUES ('$Data', $Situacao, '$Descricao', $Valor, $id_veiculo)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todas as ordens de serviço
    public function obterTodasOrdensServico() {
        $query = "SELECT * FROM Ordem_Servico";
        $result = $this->conexao->query($query);

        $ordensServico = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ordemServico = new OrdemServico($row['id'], $row['Data'], $row['Situacao'], $row['Descricao'], $row['Valor'], $row['id_veiculo']);
                $ordensServico[] = $ordemServico;
            }
        }

        return $ordensServico;
    }

    // Método para obter uma ordem de serviço pelo ID
    public function obterOrdemServicoPorID($id) {
        $query = "SELECT * FROM Ordem_Servico WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $ordemServico = new OrdemServico($row['id'], $row['Data'], $row['Situacao'], $row['Descricao'], $row['Valor'], $row['id_veiculo']);
            return $ordemServico;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de uma ordem de serviço
    public function atualizarOrdemServico($id, $Data, $Situacao, $Descricao, $Valor, $id_veiculo) {
        $query = "UPDATE Ordem_Servico SET Data = '$Data', Situacao = $Situacao, Descricao = '$Descricao', Valor = $Valor, id_veiculo = $id_veiculo WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir uma ordem de serviço pelo ID
    public function excluirOrdemServico($id) {
        $query = "DELETE FROM Ordem_Servico WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// Exemplo de uso:
// $ordemServico = new OrdemServico(1, '2023-11-22', 1, 'Descrição da ordem de serviço', 100.00, 1);
// $ordemServico->criarOrdemServico('2023-11-23', 2, 'Nova descrição', 150.00, 2);
// $ordensServico = $ordemServico->obterTodasOrdensServico();
// print_r($ordensServico);
// $ordemServicoAtualizada = $ordemServico->atualizarOrdemServico(1, '2023-11-24', 1, 'Descrição atualizada', 120.00, 3);
// $ordemServicoExcluida = $ordemServico->excluirOrdemServico(2);

?>
