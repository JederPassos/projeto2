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
echo $_SESSION['id'];
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
        <form action="agendar.php" method="POST">
            <fieldset>
                <legend>Agendamento</legend>

                <div class="inputbox">
                    <label for="nome"> Nome :</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>

                </div>

                <div class="inputbox">
                    <label for="nome"> Marca :</label>
                    <input type="text" name="marca" id="marca" class="inputUser" required>

                </div>

                <div class="inputbox">
                    <label for="nome"> Modelo :</label>
                    <input type="text" name="marca" id="marca" class="inputUser" required>

                </div>

                <div class="inputbox">
                    <label for="nome"> Placa :</label>
                    <input type="text" name="marca" id="marca" class="inputUser" required>

                </div>

                <div class="inputbox">
                    <label for="data_agendada"><br> Agendamento :</label>
                    <input type="date" name="data_agendada" id="data_agendada" class="inputUser" required>

                </div> <br>

                <input type="text" name="clienteid" hidden value="<?=$_SESSION['id']?>">
                
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>
