<?php

    class Usuario{

        private $login;
        private $senha;
        private $id;

        public function __construct($login, $senha, $id){
            $this->login = $login;
            $this->senha = $senha;
            $this->id = $id;
        }

        public function __get($metodo){
            return $this->$metodo;
        }
    }

?>