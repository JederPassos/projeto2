<?php

require_once '../Conexao.php';
require_once 'Alocar.php';

class OrdemServico extends ConexaoMySQL
{

    // Método para criar uma nova ordem de serviço
    public function criarOrdemServico($Data, $Situacao, $Descricao, $Valor, $id_veiculo)
    {
        // Cria a ordem de serviço
        $query = "INSERT INTO Ordem_Servico (Data, Situacao, Descricao, Valor, id_veiculo) VALUES ('$Data', $Situacao, '$Descricao', $Valor, $id_veiculo)";
        $result = $this->conexao->query($query);

        if ($result) {
            // Obtém o ID da ordem de serviço recém-criada
            $id_ordem_servico = $this->conexao->insert_id;

            // Insere automaticamente na tabela Alocar
            $this->inserirAlocacaoAutomatica($id_ordem_servico);

            return true;
        } else {
            return false;
        }
    }

    // Método privado para inserir automaticamente uma alocação na tabela Alocar
    public function inserirAlocacaoAutomatica($id_ordem_servico)
    {
        // Aqui você precisa decidir como obter o ID do funcionário disponível.
        // Suponha que obterFuncionariosDisponiveis() retorne um array de funcionários.
        $alocar = new Alocar;
        $funcionarios_disponiveis = $alocar->obterFuncionariosDisponiveis();

        // Verifica se há pelo menos um funcionário disponível
        if (!empty($funcionarios_disponiveis)) {
            // Obtém o primeiro funcionário disponível (ou implemente sua lógica para escolher um)
            $funcionario_disponivel = $funcionarios_disponiveis[0];
            $funcionario_id = $funcionario_disponivel->id;

            // Insere na tabela Alocar
            $query = "INSERT INTO Alocar (Funcionario_id, Ordem_Servico_id) VALUES ($funcionario_id, $id_ordem_servico)";
            $result = $this->conexao->query($query);

            if (!$result) {
                echo "Erro ao realizar a alocação";
                return false;
            } else {
                echo "Alocação realizada com sucesso!";
                return true;
            }
        } else {
            echo "Não existem funcionários disponíveis";
            return false;
        }
    }
    // Se não houver funcionários disponíveis, você pode lidar com isso conforme necessário



    public function obterTodasOrdensServico()
    {
        $query = "SELECT * FROM Ordem_Servico";
        $result = $this->conexao->query($query);

        $ordensServico = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ordensServico[] = $row;
            }
        }

        return $ordensServico;
    }

    public function obterOrdemServicoPorID($id)
    {
        $query = "SELECT * FROM Ordem_Servico WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }

    public function atualizarOrdemServico($id, $Data, $Situacao, $Descricao, $Valor, $id_veiculo)
    {
        $stmt = $this->conexao->prepare("UPDATE Ordem_Servico SET Data = ?, Situacao = ?, Descricao = ?, Valor = ?, id_veiculo = ? WHERE id = ?");
        $stmt->bind_param("sdsdii", $Data, $Situacao, $Descricao, $Valor, $id_veiculo, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluirOrdemServico($id)
    {
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
// $ordemServico = new OrdemServico();
// $ordemServico->criarOrdemServico('2023-11-23', 2, 'Nova descrição', 150.00, 2);
// $ordensServico = $ordemServico->obterTodasOrdensServico();
// print_r($ordensServico);
