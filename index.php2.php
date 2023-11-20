<?php


class Cliente
{
    public $nome;
    private $cpf;
    public $telefone;
    public $endereco;
    private $email;
    public $senha;

    public function getcpf()
    {
        return $this->cpf;
    }

    public function setcpf($c)
    {
        $this->cpf = $c;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($e)
    {
        $this->email = $e;
    }

    public function Logar()
    {
        if ($this->email == "teste@teste.com" and $this->senha == "012345678910") {
            echo "Login bem-sucedido!";
        } else {
            echo "Dados Inválidos";
        }
    }
}

class Registro extends Cliente
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserirRegistro()
    {
        $sql = "INSERT INTO Registro (Id_Email, Senha) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("ss", $this->getemail(), $this->senha);
        return $stmt->execute();
    }

    // Outros métodos para operações de banco de dados podem ser adicionados aqui

}

// Exemplo de uso da classe Registro
// $conexao = new mysqli("seu_servidor", "seu_usuario", "sua_senha", "seu_banco");
// $registro = new Registro($conexao);
// $registro->setemail("exemplo@email.com");
// $registro->senha = "senha123";
// $registro->inserirRegistro();

class Servico
{
    public $orden_servico;
    public $situacao;
    public $descricao_servico;
    public $data;

    // Construtor para inicializar os atributos
    public function __construct($orden_servico, $situacao, $descricao_servico, $data)
    {
        $this->orden_servico = $orden_servico;
        $this->situacao = $situacao;
        $this->descricao_servico = $descricao_servico;
        $this->data = $data;
    }

    public function Fazer()
    {
        echo "Fez <br>";
    }
}

// Instanciando e configurando um objeto da classe Servico
$servico = new Servico("OS123", "Em andamento", "Manutenção de motor", "2023-01-01");
$servico->Fazer();

// Exemplo de acesso aos atributos após a instância
echo "Ordem de Serviço: " . $servico->orden_servico . "<br>";
echo "Situação: " . $servico->situacao . "<br>";
echo "Descrição do Serviço: " . $servico->descricao_servico . "<br>";
echo "Data: " . $servico->data . "<br>";



class Funcionario
{
    public $nome;
    private $codigo;
    private $cpf;

    // Construtor para inicializar os atributos
    public function __construct($nome, $codigo, $cpf)
    {
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->cpf = $cpf;
    }

    public function Lavou()
    {
        echo $this->nome . " lavou <br>";
    }

    // Getter para o código
    public function getCodigo()
    {
        return $this->codigo;
    }

    // Setter para o código
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    // Getter para o CPF
    public function getCPF()
    {
        return $this->cpf;
    }

    // Setter para o CPF
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    
}

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



class Veiculo
{
    // Atributos comuns a Carro e Moto
    public $placa;
    public $modelo;
    public $cor;
    public $ano;

    // Método genérico para todos os veículos
    public function Andar()
    {
        echo "Andou";
    }

    public function Parar()
    {
        echo "Parou";
    }
}

class Carro extends Veiculo
{
    public function ligarLimpador()
    {
        echo "Limpando ";
    }
}

class Moto extends Veiculo
{
    public function darGrau()
    {
        echo "Dando grau ";
    }
}

// Instanciando e configurando um objeto da classe Carro
$carro = new Carro();
$carro->placa = "jjj0099";
$carro->modelo = "chevette";
$carro->cor = "bege";
$carro->ano = "1979";
$carro->Andar();
echo "<br>";
$carro->ligarLimpador();
var_dump($carro);

// Instanciando e configurando um objeto da classe Moto
$moto = new Moto();
$moto->placa = "jkk0099";
$moto->modelo = "honda PCX";
$moto->cor = "cinza";
$moto->ano = "2023";
$moto->Parar(); 
echo "<br>";
$moto->darGrau();
var_dump($moto);



class Tipo_de_lavagem
{
    public $simples;
    public $geral;
    public $motor;

    // Construtor para inicializar os atributos
    public function __construct($simples, $geral, $motor)
    {
        $this->simples = $simples;
        $this->geral = $geral;
        $this->motor = $motor;
    }

    public function selecionar()
    {
        echo "Solicitar: ";
    }
}

// Instanciando e configurando um objeto da classe Tipo_de_lavagem
$tipo_de_lavagem = new Tipo_de_lavagem("Limpeza Leve ", "Limpeza Pesada ", "Manutenção de Motor ");
$tipo_de_lavagem->selecionar();

// Exemplo de acesso aos atributos após a instância
echo "Lavagem Simples: " . $tipo_de_lavagem->simples . "<br>";
echo "Lavagem Geral: " . $tipo_de_lavagem->geral . "<br>";
echo "Lavagem de Motor: " . $tipo_de_lavagem->motor . "<br>";


?>
