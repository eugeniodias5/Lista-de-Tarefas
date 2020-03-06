<?php

require_once 'Tarefa.php';
require_once 'Usuario.php';

class BD{

    private $db;
    private $nomedb;
    private $dsn;
    private $user;
    private $senha;

    function __construct(){
        $this->nomedb = 'app_lista_tarefas';
        $this->dsn = 'mysql:dbname=' .  $this->nomedb . ';host=localhost';
        $this->user = 'root';
        $this->senha = '';
        $this->conectaBD(); //Conecta com o banco de dados
    }

    private function conectaBD(){
        try{
            $this->db = new PDO($this->dsn, $this->user, $this->senha);

        }catch(PDOException $e){
            echo 'Erro de conexão ' . $e->getMessage();
        }
    }

    public function adicionaTarefa(Usuario $usuario, Tarefa $tarefa){

        $sql = 'INSERT INTO 
                tb_tarefas
                (idUsuario, descricaoTarefa, concluida) 
                 VALUES 
                ( ?, ?, ?);';

            ($this->db)->prepare($sql)->execute([$usuario->id, $tarefa->descricaoTarefa, 0]);
    }

    public function removeTarefa(Tarefa $tarefa){
        
        $sql = 'DELETE FROM 
                tb_tarefas 
                WHERE 
                idTarefa = ?;';

        ($this->db)->prepare($sql)->execute([$tarefa->id]);
    }

    public function concluiTarefa(Tarefa $tarefa){

        $sql = 'UPDATE 
                tb_tarefas
                SET 
                concluida = 1 
                WHERE 
                idTarefa = ?;';

        ($this->db)->prepare($sql)->execute([$tarefa->id]);

    }

    public function recuperaTarefas(Usuario $usuario){

        $sql = 'SELECT 
                idTarefa as id, descricaoTarefa, concluida
                FROM 
                tb_tarefas
                LEFT JOIN
                tb_usuarios
                ON
                tb_tarefas.idUsuario = tb_usuarios.idUsuario
                WHERE
                tb_usuarios.idUsuario = ?;';

        $statement = ($this->db)->prepare($sql);
        
        $statement->execute([$usuario->id]);

        return $statement->fetchall(PDO::FETCH_OBJ);

    }

    public function recuperaTarefasNaoConcluidas(Usuario $usuario){

        $sql = 'SELECT 
                idTarefa as id, descricaoTarefa, concluida
                FROM 
                tb_tarefas
                LEFT JOIN
                tb_usuarios
                ON
                tb_tarefas.idUsuario = tb_usuarios.idUsuario
                WHERE
                tb_usuarios.idUsuario = ? AND tb_tarefas.concluida = 0;';

        $statement = ($this->db)->prepare($sql);
        
        $statement->execute([$usuario->id]);

        return $statement->fetchall(PDO::FETCH_OBJ);

    }

    public function adicionaUsuario(Usuario $usuario){

        $sql = 'INSERT INTO 
                tb_usuarios
                (login, senha)
                VALUES 
                (?, ?);';

        echo $this->nomeTabela;        

        //Cadastra Usuário caso não exista
        if(empty($this->recuperaUsuario($usuario))){
            $this->db->prepare($sql)->execute([$usuario->login, $usuario->senha]);
            return true;    //Retorna true se o usuário foi cadastrado corretamente
        }
        else
            return false;  //Retorna false se o usuário não foi cadastrado

    }

    public function recuperaUsuario(Usuario $usuario){
        
        $sql = 'SELECT 
                *
                FROM 
                tb_usuarios
                WHERE
                login = ?;';
        
        $stm = $this->db->prepare($sql);

        $stm->execute([$usuario->login]);

        return $stm->fetch(PDO::FETCH_OBJ);
    }

}