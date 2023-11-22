<?php

require_once '../Conexao.php';

class Cliente extends ConexaoMySQL {
    public $id;
    public $Telefone;
    public $Email;
    public $Nome;
    public $Senha;

    public function __construct($id, $Telefone, $Email, $Nome, $Senha) {
        $this->id = $id;
        $this->Telefone = $Telefone;
        $this->Email = $Email;
        $this->Nome = $Nome;
        $this->Senha = $Senha;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo cliente
    public function criarCliente($Telefone, $Email, $Nome, $Senha) {
        $query = "INSERT INTO Cliente (Telefone, Email, Nome, Senha) VALUES ($Telefone, '$Email', '$Nome', '$Senha')";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os clientes
    public function obterTodosClientes() {
        $query = "SELECT * FROM Cliente";
        $result = $this->conexao->query($query);

        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente = new Cliente($row['id'], $row['Telefone'], $row['Email'], $row['Nome'], $row['Senha']);
                $clientes[] = $cliente;
            }
        }

        return $clientes;
    }

    // Método para obter um cliente pelo ID
    public function obterClientePorID($id) {
        $query = "SELECT * FROM Cliente WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $cliente = new Cliente($row['id'], $row['Telefone'], $row['Email'], $row['Nome'], $row['Senha']);
            return $cliente;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um cliente
    public function atualizarCliente($id, $Telefone, $Email, $Nome, $Senha) {
        $query = "UPDATE Cliente SET Telefone = $Telefone, Email = '$Email', Nome = '$Nome', Senha = '$Senha' WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um cliente pelo ID
    public function excluirCliente($id) {
        $query = "DELETE FROM Cliente WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
