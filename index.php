<?php


// Instanciando e configurando um objeto da classe Servico
$servico = new Servico("OS123", "Em andamento", "Manutenção de motor", "2023-01-01");
$servico->Fazer();

// Exemplo de acesso aos atributos após a instância
echo "Ordem de Serviço: " . $servico->orden_servico . "<br>";
echo "Situação: " . $servico->situacao . "<br>";
echo "Descrição do Serviço: " . $servico->descricao_servico . "<br>";
echo "Data: " . $servico->data . "<br>";

// Exemplo de instância e uso da classe Funcionario
$funcionario = new Funcionario("João", 123, "123.456.789-01");
$funcionario->Lavou();

// Exemplo de uso de getters e setters
echo "Código do Funcionário: " . $funcionario->getCodigo() . "<br>";
echo "CPF do Funcionário: " . $funcionario->getCPF() . "<br>";
$funcionario->setCodigo(456);
$funcionario->setCPF("987.654.321-00");
echo "Novo Código do Funcionário: " . $funcionario->getCodigo() . "<br>";
echo "Novo CPF do Funcionário: " . $funcionario->getCPF() . "<br>";

// Instanciando e configurando um objeto da classe Tipo_de_lavagem
$tipo_de_lavagem = new Tipo_de_lavagem("Limpeza Leve ", "Limpeza Pesada ", "Manutenção de Motor ");
$tipo_de_lavagem->selecionar();

// Exemplo de acesso aos atributos após a instância
echo "Lavagem Simples: " . $tipo_de_lavagem->simples . "<br>";
echo "Lavagem Geral: " . $tipo_de_lavagem->geral . "<br>";
echo "Lavagem de Motor: " . $tipo_de_lavagem->motor . "<br>";


?>
