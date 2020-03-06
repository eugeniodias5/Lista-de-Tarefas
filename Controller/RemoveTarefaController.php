<?php

    require_once "../Model/BD.php";
    require_once "../Model/Tarefa.php";

    class RemoveTarefaController{
        private $bd;

        function __construct(){
            $this->bd = new BD();
        } 

        public function removeTarefa(Tarefa $tarefa){
            ($this->bd)->removeTarefa($tarefa);
        }
    }

    //Receberá ID da tarefa que deve ser concluida via GET
    (new RemoveTarefaController())->removeTarefa(new Tarefa('', $_GET['id']));
?>