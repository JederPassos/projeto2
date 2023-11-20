<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lava Jato</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="box">
        <form action>
            <form class="formulario"></form>
            <fieldset>
                <legend>Agendamento</legend>

                <!-- criar caixas de dialogo -->

                <div class="inputbox">
                    <label for="nome"> Nome :</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>

                <div class="inputbox">
                    <label for="cpf">CPF :</label>
                    <input type="cpf" name="cpf" id="cpf" class="inputUser" required>

                </div>
                <div class="inputbox">
                    <label for="telefone">Telefone :</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>

                </div>
                <div class="inputbox">
                    <label for="endereco">Endereço :</label>
                    <input type="endereco" name="endereco" id="endereco" class="inputUser" required>

                </div>
                <div class="inputbox">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" id="email" class="inputUser" required>

                </div>

                <div class="inputbox">
                    <label for="marca"> Marca :</label>
                    <input type="marca" name="marca" id="marca" class="inputUser" required>
                    <div class="inputbox">
                        <label for="placa">Descrição do veículo :</label>
                        <input type="placa" name="placa" id="placa" class="inputUser" required>

                    </div>
                    <div class="inputbox">
                        <label for="placa">Placa do Veículo :</label>
                        <input type="placa" name="placa" id="placa" class="inputUser" required>

                    </div>
                    <!-- criar caixa de seleção de itens -->

                    <p>Tipos de lavagem :</p>
                    <select name="lavagens" id="tipo_de_lavagens">
                        <option value="geral">Geral</option>
                        <option value="simples">Simples</option>
                        <option value="motor">Motor</option>
                    </select> <br>

                    <label for="informacoes_do_veiculo"><br>Qual é o seu
                        porte :</label> <br>

                    <select name="modelo_do_veiculo" id="modelo_do_veiculo">

                        <option value="carro">Carro</option>
                        <option value="moto">Moto</option>
                    </select>
                    <div class="inputbox">
                        <label for="data_agendada"><br> Agendamento :</label>
                        <input type="date" name="data_agendada" id="data_agendada" class="inputUser" required>
                    </div> <br>

                    <!-- criar botão de envio -->

                    <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>
</body>

</html>