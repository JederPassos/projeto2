<?php

require_once 'Conexao.php';

class Veiculo extends ConexaoMySQL
{
    public function __construct()
    {
        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo veículo
    public function criarVeiculo($Marca, $Modelo, $Placa, $Cliente_id)
    {
        $query = "INSERT INTO Veiculo (Marca, Modelo, Placa, Cliente_id_CPF_cliente) VALUES ('$Marca', '$Modelo', '$Placa', $Cliente_id)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os veículos
    public function obterTodosVeiculos()
    {
        $query = "SELECT * FROM Veiculo";
        $result = $this->conexao->query($query);

        $veiculos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $veiculo = array(
                    'id' => $row['id'],
                    'Marca' => $row['Marca'],
                    'Modelo' => $row['Modelo'],
                    'Placa' => $row['Placa'],
                    'Cliente_id' => $row['Cliente_id']
                );

                $veiculos[] = $veiculo;
            }
        }

        return $veiculos;
    }

    public function obterVeiculoPorID($id)
    {
        $query = "SELECT * FROM Veiculo WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $veiculo = array(
                'id' => $row['id'],
                'Marca' => $row['Marca'],
                'Modelo' => $row['Modelo'],
                'Placa' => $row['Placa'],
                'Cliente_id' => $row['Cliente_id']
            );

            return $veiculo;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um veículo
    public function atualizarVeiculo($id, $Marca, $Modelo, $Placa, $Cliente_id)
    {
        $query = "UPDATE Veiculo SET Marca = '$Marca', Modelo = '$Modelo', Placa = '$Placa', Cliente_id = $Cliente_id WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um veículo pelo ID
    public function excluirVeiculo($id)
    {
        $query = "DELETE FROM Veiculo WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obterUltimoIdVeiculo()
    {
        return $this->conexao->insert_id;
    }
}
