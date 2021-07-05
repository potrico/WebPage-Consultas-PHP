<?php

    class Paciente {
      private $nome;
      private $cpf;
      private $endereco;
      private $cep;
      private $email;
      private $telefone;
    
      public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
      }
    
      public function __get($propriedade) {
        return $this->$propriedade;
      }
    }

?>