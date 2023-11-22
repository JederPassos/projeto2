<?php

require_once '../Conexao.php';

class Veiculo extends ConexaoMySQL {
    public $id;
    public $Marca;
    public $Modelo;
    public $Placa;
    public $Cliente_id_CPF_cliente;

    public function __construct($id, $Marca, $Modelo, $Placa, $Cliente_id_CPF_cliente) {
        $this->id = $id;
        $this->Marca = $Marca;
        $this->Modelo = $Modelo;
        $this->Placa = $Placa;
        $this->Cliente_id_CPF_cliente = $Cliente_id_CPF_cliente;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar um novo veículo
    public function criarVeiculo($Marca, $Modelo, $Placa, $Cliente_id_CPF_cliente) {
        $query = "INSERT INTO Veiculo (Marca, Modelo, Placa, Cliente_id_CPF_cliente) VALUES ('$Marca', '$Modelo', '$Placa', $Cliente_id_CPF_cliente)";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todos os veículos
    public function obterTodosVeiculos() {
        $query = "SELECT * FROM Veiculo";
        $result = $this->conexao->query($query);

        $veiculos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $veiculo = new Veiculo($row['id'], $row['Marca'], $row['Modelo'], $row['Placa'], $row['Cliente_id_CPF_cliente']);
                $veiculos[] = $veiculo;
            }
        }

        return $veiculos;
    }

    // Método para obter um veículo pelo ID
    public function obterVeiculoPorID($id) {
        $query = "SELECT * FROM Veiculo WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $veiculo = new Veiculo($row['id'], $row['Marca'], $row['Modelo'], $row['Placa'], $row['Cliente_id_CPF_cliente']);
            return $veiculo;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de um veículo
    public function atualizarVeiculo($id, $Marca, $Modelo, $Placa, $Cliente_id_CPF_cliente) {
        $query = "UPDATE Veiculo SET Marca = '$Marca', Modelo = '$Modelo', Placa = '$Placa', Cliente_id_CPF_cliente = $Cliente_id_CPF_cliente WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir um veículo pelo ID
    public function excluirVeiculo($id) {
        $query = "DELETE FROM Veiculo WHERE id = $id";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
