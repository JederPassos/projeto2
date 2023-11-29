<?php

require_once 'Conexao.php';

class Funcionario extends ConexaoMySQL {
    public $id;
    public $Nome;

    public function __construct($id, $Nome) {
        $this->id = $id;
        $this->Nome = $Nome;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo funcionário
    public function criarFuncionario($nome) {
        $query = "INSERT INTO Funcionario (Nome) VALUES ('$nome')";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os funcionários
    public function obterTodosFuncionarios() {
        $query = "SELECT * FROM Funcionario";
        $result = $this->conexao->query($query);

        $funcionarios = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $funcionario = new Funcionario($row['id'], $row['Nome']);
                $funcionarios[] = $funcionario;
            }
        }

        return $funcionarios;
    }

    // Método para obter um funcionário pelo ID
    public function obterFuncionarioPorID($id) {
        $query = "SELECT * FROM Funcionario WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $funcionario = new Funcionario($row['id'], $row['Nome']);
            return $funcionario;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um funcionário
    public function atualizarFuncionario($id, $nome) {
        $query = "UPDATE Funcionario SET Nome = '$nome' WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um funcionário pelo ID
    public function excluirFuncionario($id) {
        $query = "DELETE FROM Funcionario WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
