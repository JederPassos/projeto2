<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: login.php");
    exit(); // Certifique-se de parar a execução do script após o redirecionamento
}

// Resto do seu código HTML e formulário aqui
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lava Jato</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="box">
        <form action>
            <fieldset>
                <legend>Agendamento</legend>

                <!-- criar caixas de dialogo -->

                <div class="inputbox">
                    <label for="nome"> Nome :</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>

                </div>
                <!-- Resto do seu formulário ... -->

                <div class="inputbox">
                    <label for="data_agendada"><br> Agendamento :</label>
                    <input type="date" name="data_agendada" id="data_agendada" class="inputUser" required>

                    <!-- criar botão de envio -->

                </div> <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>
