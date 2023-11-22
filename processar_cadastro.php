<?php
require_once('models/Cliente.php');

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Crie uma instância da classe Cliente
    $cliente = new Cliente();

    // Faça a inserção no banco de dados
    $insercao_sucesso = $cliente->inserirCliente($nome, $telefone, $email, $senha);

    // Verifique se a inserção foi bem-sucedida
    if ($insercao_sucesso) {
        // Redirecione para a página de sucesso ou faça o que for necessário
        header("Location: cadastro_sucesso.php");
        exit();
    } else {
        // Exiba uma mensagem de erro (pode redirecionar de volta para a página de cadastro)
        echo "Erro ao cadastrar usuário!";
    }
}
?>