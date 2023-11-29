<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('models/OrdemServico.php');
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $dataAgendada = $_POST["data_agendada"];
    $clienteId = $_POST["clienteid"];

    // Insere os dados no banco de dados

    if ($conexao->query($query) === TRUE) {
        echo "Agendamento realizado com sucesso!";
    } else {
        echo "Erro ao agendar: ";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
