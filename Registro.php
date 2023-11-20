<?php

class Registro {
    private $conexao;

    // Construtor que recebe a conexão com o banco de dados
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Método para inserir um novo registro
    public function inserirRegistro($idEmail, $senha) {
        $sql = "INSERT INTO Registro (Id_Email, Senha) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("ss", $idEmail, $senha);
        return $stmt->execute();
    }

    // Método para atualizar um registro existente
    public function atualizarRegistro($idEmail, $novaSenha) {
        $sql = "UPDATE Registro SET Senha = ? WHERE Id_Email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("ss", $novaSenha, $idEmail);
        return $stmt->execute();
    }

    // Método para excluir um registro
    public function excluirRegistro($idEmail) {
        $sql = "DELETE FROM Registro WHERE Id_Email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("s", $idEmail);
        return $stmt->execute();
    }

    // Método para recuperar um registro pelo ID de e-mail
    public function obterRegistroPorId($idEmail) {
        $sql = "SELECT * FROM Registro WHERE Id_Email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("s", $idEmail);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}

// Exemplo de uso:
// $conexao = new mysqli("seu_servidor", "seu_usuario", "sua_senha", "seu_banco");
// $registro = new Registro($conexao);
// $registro->inserirRegistro("exemplo@email.com", "senha123");

?>
