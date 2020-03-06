<?php

    require_once "../Model/BD.php";
    require_once "../Model/Tarefa.php";

    class ConcluiTarefaController{
        private $bd;

        function __construct(){
            $this->bd = new BD();
        } 

        public function concluiTarefa($id){
            ($this->bd)->concluiTarefa(new Tarefa('', $id));
        }
    }
    //Receberá ID da tarefa que deve ser concluida via GET
    (new ConcluiTarefaController())->concluiTarefa($_GET['id']);