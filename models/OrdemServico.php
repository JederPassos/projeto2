<?php

require_once 'Conexao.php';
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
    // Restante da classe permanece o mesmo...

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

    public function obterOrdensServicoPorSituacao($situacao)
    {
        $query = "SELECT os.*, f.nome AS nome_funcionario
                  FROM Ordem_Servico os
                  INNER JOIN Alocar a ON os.id = a.Ordem_Servico_id
                  INNER JOIN Funcionario f ON a.Funcionario_id = f.id
                  WHERE os.Situacao = $situacao";

        $result = $this->conexao->query($query);

        $ordensServico = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ordensServico[] = $row;
            }
        }

        return $ordensServico;
    }


    public function finalizarOrdemServico($ordemID)
    {
        $query = "UPDATE Ordem_Servico SET Situacao = 1 WHERE id = $ordemID";
        $result = $this->conexao->query($query);

        return $result;
    }

    public function desalocarFuncionarioResponsavel($ordemID)
    {
        $query = "DELETE FROM Alocar WHERE Ordem_Servico_id = $ordemID";
        $result = $this->conexao->query($query);

        return $result;
    }

    public function obterUltimoIdOrdemServico()
    {
        return $this->conexao->insert_id;
    }
}
