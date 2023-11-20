<?php

class Cliente
{
   public $nome;
   private $cpf;
   public $telefone;
   public $endereco;
   private $email;
   public function getcpf()
   {
      return $this->cpf;
   }
   public function setcpf($c)
   {
      $this = $c;
   }

   public function getemail()
   {
      return $this->cpf;
   }
   public function setemail($e)
   {
      $this = $e;
   }

   public function Logar()
   {
      if ($this->email == "teste@teste.com" and $this->senha == "012345678910") {
      } else {
         echo "Dados Invalidos";
      }
   }
}
