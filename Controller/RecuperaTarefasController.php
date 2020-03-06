<?php

    require_once "../Model/BD.php";
    require_once "../Model/Usuario.php";

    class recuperaTarefasController{

        private $bd;

        function __construct(){
            $this->bd = new BD();
        } 

        public function recuperaTarefas(Usuario $usuario){
            return ($this->bd)->recuperaTarefas($usuario);
        }

        public function recuperaTarefasNaoConcluidas(Usuario $usuario){
            return ($this->bd)->recuperaTarefasNaoConcluidas($usuario);
        }
    }