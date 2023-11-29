<?php

require_once 'Conexao.php';

class Reserva extends ConexaoMySQL {
    public $id_veiculo;
    public $Data;

    public function __construct($id_veiculo, $Data) {
        $this->id_veiculo = $id_veiculo;
        $this->Data = $Data;

        // Chame o construtor da classe pai para estabelecer a conexão com o banco de dados
        parent::__construct();
    }

    // Método para criar uma nova reserva
    public function criarReserva($id_veiculo, $Data) {
        $query = "INSERT INTO Reserva (id_veiculo, Data) VALUES ($id_veiculo, '$Data')";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obter todas as reservas
    public function obterTodasReservas() {
        $query = "SELECT * FROM Reserva";
        $result = $this->conexao->query($query);

        $reservas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reserva = new Reserva($row['id_veiculo'], $row['Data']);
                $reservas[] = $reserva;
            }
        }

        return $reservas;
    }

    // Método para obter uma reserva pelo ID do veículo
    public function obterReservaPorVeiculo($id_veiculo) {
        $query = "SELECT * FROM Reserva WHERE id_veiculo = $id_veiculo";
        $result = $this->conexao->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $reserva = new Reserva($row['id_veiculo'], $row['Data']);
            return $reserva;
        } else {
            return null;
        }
    }

    // Método para atualizar as informações de uma reserva
    public function atualizarReserva($id_veiculo, $Data) {
        $query = "UPDATE Reserva SET Data = '$Data' WHERE id_veiculo = $id_veiculo";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Método para excluir uma reserva pelo ID do veículo
    public function excluirReserva($id_veiculo) {
        $query = "DELETE FROM Reserva WHERE id_veiculo = $id_veiculo";
        $result = $this->conexao->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

?>
