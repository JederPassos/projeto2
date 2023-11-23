<?php

require('Conexao.php');

class Cliente extends ConexaoMySQL
{
    public $id;
    public $Telefone;
    public $Email;
    public $Nome;
    public $Senha;

    public function __construct()
    {
        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo cliente
    public function criarCliente($Telefone, $Email, $Nome, $Senha)
    {
        $query = "INSERT INTO Cliente (Telefone, Email, Nome, Senha) VALUES ($Telefone, '$Email', '$Nome', '$Senha')";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os clientes
    public function obterTodosClientes()
    {
        $query = "SELECT * FROM Cliente";
        $result = $this->conexao->query($query);

        $clientes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente = new Cliente();
                $cliente->id = $row['id'];
                $cliente->Telefone = $row['Telefone'];
                $cliente->Email = $row['Email'];
                $cliente->Nome = $row['Nome'];
                $cliente->Senha = $row['Senha'];

                $clientes[] = $cliente;
            }
        }

        return $clientes;
    }

    // Método para obter um cliente pelo ID
    public function obterClientePorID($id)
    {
        $query = "SELECT * FROM Cliente WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $cliente = new Cliente();
            $cliente->id = $row['id'];
            $cliente->Telefone = $row['Telefone'];
            $cliente->Email = $row['Email'];
            $cliente->Nome = $row['Nome'];
            $cliente->Senha = $row['Senha'];

            return $cliente;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um cliente
    public function atualizarCliente($id, $Telefone, $Email, $Nome, $Senha)
    {
        $query = "UPDATE Cliente SET Telefone = $Telefone, Email = '$Email', Nome = '$Nome', Senha = '$Senha' WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um cliente pelo ID
    public function excluirCliente($id)
    {
        $query = "DELETE FROM Cliente WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function autenticar($email, $senha)
    {
        // Sanitize inputs to prevent SQL injection (use prepared statements for better security)
        $email = $this->conexao->real_escape_string($email);

        // Consulta usando prepared statement para verificar se o cliente com as credenciais fornecidas existe
        $query = "SELECT * FROM Cliente WHERE Email = ? LIMIT 1";

        // Preparar a consulta
        $stmt = $this->conexao->prepare($query);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Bind dos parâmetros
            $stmt->bind_param('s', $email);

            // Executar a consulta
            $stmt->execute();

            // Obter o resultado da consulta
            $result = $stmt->get_result();

            // Verificar se encontrou um cliente
            if ($result->num_rows == 1) {
                // Obter os dados do cliente
                $cliente = $result->fetch_assoc();

                // Verificar a senha usando password_verify
                if ($senha == $cliente['Senha']) {
                    // Se a senha corresponder, autenticação bem-sucedida
                    return true;
                }
            }
        }

        // Se não encontrou um cliente ou a autenticação falhou, retornar false
        return false;
    }

    public function obterClientePorEmail($email)
    {
        // Sanitize inputs to prevent SQL injection (use prepared statements for better security)
        $email = $this->conexao->real_escape_string($email);
        $query = "SELECT * FROM Cliente WHERE Email = ? LIMIT 1";
        // Preparar a consulta
        $stmt = $this->conexao->prepare($query);
        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            // Bind dos parâmetros
            $stmt->bind_param('s', $email);
            // Executar a consulta
            $stmt->execute();
            // Obter o resultado da consulta
            $result = $stmt->get_result();
            // Verificar se encontrou um cliente
            if ($result->num_rows == 1) {
                // Obter os dados do cliente
                $cliente = $result->fetch_assoc();
                // Retornar o cliente
                return $cliente;
            }
        }
        // Se não encontrou um cliente, retornar false
        return false;
    }
}
