<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de configuração ou qualquer lógica necessária para obter a conexão
    // Certifique-se de incluir a lógica apropriada para obter a conexão com o banco de dados
    require_once('Caminho/Para/Conexao.php');
    require_once('models/OrdemServico.php');

    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $dataAgendada = $_POST["data_agendada"];
    $clienteId = $_POST["clienteid"];

    // Cria uma instância da classe OrdemServico
    $ordemServico = new OrdemServico();

    // Cria a ordem de serviço
    $ordemCriada = $ordemServico->criarOrdemServico($dataAgendada, 'Situacao_Padrao', 'Descricao_Padrao', 1500.50, $clienteId);

    if ($ordemCriada) {
        // Insira aqui a lógica para obter o ID da ordem de serviço recém-criada
        $id_ordem_servico = // Obtenha o ID da ordem de serviço recém-criada;

            // Insira a lógica para alocar automaticamente um funcionário à ordem de serviço
            $ordemServico->inserirAlocacaoAutomatica($id_ordem_servico);

        if ($ordemServico) {
            echo "<script>alert('Ordem criada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao criar a ordem de serviço!')</script>";
        }
    } else {
        echo "Erro ao agendar a ordem de serviço.";
    }
}
