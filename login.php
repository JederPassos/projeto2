<?php
// Inicie a sessão
session_start();


require('models/Cliente.php');
// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Inclua a classe Cliente

    // Recupere os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Crie uma instância da classe Cliente
    $cliente = new Cliente;

    // Tente autenticar o cliente
    if ($cliente->autenticar($email, $senha)) {
        // Se a autenticação for bem-sucedida, redirecione para a página principal ou faça o que for necessário
        $_SESSION['usuario_logado'] = true; // Defina uma variável de sessão para indicar que o usuário está logado
        $clientedata = $cliente->obterClientePorEmail($email);

        $_SESSION['id'] = $clientedata['id'];

        header("Location: index.php");
        exit();
    } else {
        // Se a autenticação falhar, exiba uma mensagem de erro (pode redirecionar para a página de login novamente)
        echo "Autenticação falhou!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <!--icone do navegador-->
    <link rel="shortcut icon" href="./projeto-de-logotipo-de-lavagem-de-carros_23-2149933675.avif">
</head>

<body>
    <form class="formulario" method="post">

        <div class="container">
            <div class="form-container">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="email" required />
                <input type="password" name="senha" placeholder="password" required />

                <input type="submit" name="submit" id="submit" required>
                <a class="form-btn" type="submit" href="./cadastro.php">
                    Registre-se
                </a>
            </div>
        </div>
    </form>
</body>

</html>