<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de configuração ou qualquer lógica necessária para obter a conexão
    // Certifique-se de incluir a lógica apropriada para obter a conexão com o banco de dados
    require_once('models/Veiculo.php');
    require_once('models/OrdemServico.php');

    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $dataAgendada = $_POST["data_agendada"];
    $clienteId = $_POST["clienteid"];

    // Cria uma instância da classe Veiculo
    $veiculo = new Veiculo();

    // Cria o veículo associado ao cliente
    $veiculoCriado = $veiculo->criarVeiculo($marca, $modelo, $placa, $clienteId);

    if ($veiculoCriado) {
        // Obtenha o ID do veículo recém-criado (adicione a lógica necessária)
        $idVeiculo = $veiculo->obterUltimoIdVeiculo();
        // Cria uma instância da classe OrdemServico
        $ordemServico = new OrdemServico();

        // Cria a ordem de serviço associada ao veículo
        $ordemCriada = $ordemServico->criarOrdemServico($dataAgendada, 0, 'Descricao_Padrao', 400, $idVeiculo);

        if ($ordemCriada) {
            // Obtenha o ID da ordem de serviço recém-criada (adicione a lógica necessária)
            $id_ordem_servico = $ordemServico->obterUltimoIdOrdemServico();
            // Insira a lógica para alocar automaticamente um funcionário à ordem de serviço
            $ordemServico->inserirAlocacaoAutomatica($id_ordem_servico);

            echo "<script>alert('Ordem criada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao criar a ordem de serviço!')</script>";
        }
    } else {
        echo "Erro ao criar o veículo.";
    }
}
?>
