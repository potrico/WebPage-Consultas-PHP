<?php

    class user {
        private $id;
        private $nome;
        private $nivel;
        private $usuario;
        private $senha;

    // Metodo para atribuir/buscar valores das variaveis
        public function __construct() {}

        public function __set($propriedade, $valor) {
            $this->$propriedade = $valor;
        }

        public function __get($propriedade) {
            return $this->$propriedade;
        }
    }

?>