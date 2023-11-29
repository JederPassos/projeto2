<?php

require_once 'Conexao.php';

class TipoServico extends ConexaoMySQL {
    public $Id;
    public $Nome;

    public function __construct($Id, $Nome) {
        $this->Id = $Id;
        $this->Nome = $Nome;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo tipo de serviço
    public function criarTipoServico($Nome) {
        $query = "INSERT INTO Tipo_de_Servico (Nome) VALUES ('$Nome')";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os tipos de serviço
    public function obterTodosTiposServico() {
        $query = "SELECT * FROM Tipo_de_Servico";
        $result = $this->conexao->query($query);

        $tiposServico = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tipoServico = new TipoServico($row['Id'], $row['Nome']);
                $tiposServico[] = $tipoServico;
            }
        }

        return $tiposServico;
    }

    // Método para obter um tipo de serviço pelo ID
    public function obterTipoServicoPorID($Id) {
        $query = "SELECT * FROM Tipo_de_Servico WHERE Id = $Id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $tipoServico = new TipoServico($row['Id'], $row['Nome']);
            return $tipoServico;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um tipo de serviço
    public function atualizarTipoServico($Id, $Nome) {
        $query = "UPDATE Tipo_de_Servico SET Nome = '$Nome' WHERE Id = $Id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um tipo de serviço pelo ID
    public function excluirTipoServico($Id) {
        $query = "DELETE FROM Tipo_de_Servico WHERE Id = $Id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

// Exemplo de uso:
// $tipoServico = new TipoServico(1, 'Troca de óleo');
// $tipoServico->criarTipoServico('Alinhamento');
// $tiposServico = $tipoServico->obterTodosTiposServico();
// print_r($tiposServico);
// $tipoServicoAtualizado = $tipoServico->atualizarTipoServico(1, 'Troca de óleo e filtro');
// $tipoServicoExcluido = $tipoServico->excluirTipoServico(2);

?>
