<?php

    require_once "../Model/BD.php";
    require_once "../Model/Usuario.php";
    require_once "../Model/Tarefa.php";

    session_start();

    class AdicionaTarefaController{
        private $bd;

        function __construct(){
            $this->bd = new BD();
        } 

        public function adicionaTarefa(Usuario $usuario, Tarefa $tarefa){
            ($this->bd)->adicionaTarefa($usuario, $tarefa);
        }
    }
    //Receberá descrição da tarefa que deve ser adicionada via POST
    (new AdicionaTarefaController())->adicionaTarefa($_SESSION['usuario'], new Tarefa($_POST['tarefa'], null));

    header('Location: ../View/menuView.php');
    