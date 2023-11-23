<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./projeto-de-logotipo-de-lavagem-de-carros_23-2149933675.avif" />
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="./cadastro.css">
</head>

<body>
    <div class="background">
        <form method="POST" action="processarcadastro.php">
            <div class="container">
                <div class="form-container">
                    <h1>Register</h1>

                    <div class="inputbox">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Nome" required />
                    </div>

                    <div class="inputbox">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" name="telefone" placeholder="Telefone" required />
                    </div>

                    <div class="inputbox">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" placeholder="E-mail" required />
                    </div>

                    <div class="inputbox">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" placeholder="Senha" required />
                    </div>

                    <input type="submit" name="submit" id="submit" value="Submit" required>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
