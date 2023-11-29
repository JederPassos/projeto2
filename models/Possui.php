<?php

require_once 'Conexao.php';

class Possui extends ConexaoMySQL {
    public $id_tipo_servico;
    public $id_ordem_servico;

    public function __construct($id_tipo_servico, $id_ordem_servico) {
        $this->id_tipo_servico = $id_tipo_servico;
        $this->id_ordem_servico = $id_ordem_servico;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para associar um tipo de serviço a uma ordem de serviço
    public function associarTipoServico($id_tipo_servico, $id_ordem_servico) {
        $query = "INSERT INTO Possui (id_tipo_servico, id_ordem_servico) VALUES ($id_tipo_servico, $id_ordem_servico)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os tipos de serviço associados a uma ordem de serviço
    public function obterTiposServicoAssociados($id_ordem_servico) {
        $query = "SELECT * FROM Possui WHERE id_ordem_servico = $id_ordem_servico";
        $result = $this->conexao->query($query);

        $associacoes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $associacao = new Possui($row['id_tipo_servico'], $row['id_ordem_servico']);
                $associacoes[] = $associacao;
            }
        }

        return $associacoes;
    }

    // Método para desassociar um tipo de serviço de uma ordem de serviço
    public function desassociarTipoServico($id_tipo_servico, $id_ordem_servico) {
        $query = "DELETE FROM Possui WHERE id_tipo_servico = $id_tipo_servico AND id_ordem_servico = $id_ordem_servico";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
