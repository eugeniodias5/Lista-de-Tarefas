<?php

class Tarefa{

    private $descricaoTarefa;
    private $id;

    function __construct($descricaoTarefa, $id){
        $this->descricaoTarefa = $descricaoTarefa;
        $this->id = $id;
    }

    public function __get($metodo){
        return $this->$metodo;
    }

}