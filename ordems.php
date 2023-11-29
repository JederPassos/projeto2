<?php
require_once 'models/OrdemServico.php';

// Crie uma instância da classe OrdemServico
$ordemServico = new OrdemServico();

// Obtém todas as ordens de serviço com Situacao igual a 0
$ordensServico = $ordemServico->obterOrdensServicoPorSituacao(0);

// Verifica se o formulário foi enviado (botão "Finalizar" clicado)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalizar"])) {
    // Obtém o ID da ordem de serviço a ser finalizada
    $ordemID = $_POST["ordem_id"];

    // Finaliza a ordem de serviço
    $ordemServico->finalizarOrdemServico($ordemID);

    // Desaloca o funcionário responsável
    $ordemServico->desalocarFuncionarioResponsavel($ordemID);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Serviço</title>
</head>
<body>

<h2>Ordens de Serviço Pendentes</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Situação</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>ID Veículo</th>
        <th>Funcionário Responsável</th>
        <th>Ação</th>
    </tr>

    <?php foreach ($ordensServico as $ordem): ?>
        <tr>
            <td><?= $ordem['id'] ?></td>
            <td><?= $ordem['Data'] ?></td>
            <td><?= $ordem['Situacao'] == 0 ? 'Pendente' : 'Finalizada' ?></td>
            <td><?= $ordem['Descricao'] ?></td>
            <td><?= $ordem['Valor'] ?></td>
            <td><?= $ordem['id_veiculo'] ?></td>
            <td><?= $ordem['nome_funcionario'] ?? 'Não alocado' ?></td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="ordem_id" value="<?= $ordem['id'] ?>">
                    <input type="submit" name="finalizar" value="Finalizar">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
