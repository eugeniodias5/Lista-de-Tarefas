<?php

    //Verificando se o usuário está logado
    session_start();
    if(!$_SESSION['logado'] || !isset($_SESSION['logado'])){
        //Se não estiver, retorna para a página de login
        header('Location: ../');
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Lista de Tarefas</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
        <!--Font Awesome-->
        <script src="https://kit.fontawesome.com/c6ee8371d0.js" crossorigin="anonymous"></script>

        <!--Incluindo JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!--JavaScript e CSS personalizados-->
        <link rel="stylesheet" href="../Style/menuView.css">
        <script src="../Script/menuView.js"></script>
        
        <script>
            $(document).ready(function(){
                    $('[data-toggle="popover"]').popover();   
                });
        </script>
        
    </head>

    <body>  
        <div class="container-fluid bg-light">
            <div class="d-flex navbar navbar-light ml-5">
                <div class="">
                    <a class="navbar-brand" href="#">
                        <div class="row">
                            <div class="col">
                                <i class="far fa-2x fa-check-square" style="color: lightgreen;"></i>
                            </div>
                            <div class="col d-flex align-self-center">
                                App Lista de Tarefas
                            </div>  
                        </div>
                    </a>
                    
                </div>

                <div class="ml-auto">
                    <a href="../Controller/DeslogarUsuarioController.php" title="Sair" data-toggle="popover" data-trigger="hover"><i class="fas fa-2x fa-sign-out-alt" style="color: lightgreen;"></i></a>
                </div> 
            </div>

        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group">
                        <a id="tarefas-pendentes" class="list-group-item list-group-item-action" onclick="carregaTarefasPendentes()" >Tarefas Pendentes </a>
                        <a id="nova-tarefa" class="list-group-item list-group-item-action" onclick="carregaNovaTarefa()" >Nova Tarefa</a>
                        <a id="todas-tarefas" class="list-group-item list-group-item-action active" onclick="carregaTodasTarefas()" >Todas Tarefas</a>
                    </div> 
                </div>

                <div id="tarefas" class="col-md-8">
                    
                </div>
            </div>
        </div>
    </body>

    <script> carregaTodasTarefas()   </script>
</html>