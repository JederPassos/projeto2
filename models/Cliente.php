<?php

require('../Conexao.php');

class Cliente extends ConexaoMySQL
{
    public $nome;
    private $cpf;
    public $telefone;
    public $endereco;
    private $email;
    public $senha;


}
