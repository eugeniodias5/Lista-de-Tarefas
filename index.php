<?php
    session_start();

    //Verificando se o usuário está logado. Se estiver, redireciona para o menu
    if(isset($_SESSION['logado']) && $_SESSION['logado'])
        header('Location: View/menuView.php');

    
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

        <!--JavaScript e CSS personalizados-->
        <link rel="stylesheet" href="estilo.css">

        <!--Incluindo JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="Script/index.js"></script>

    </head>

    <body style="background-color: lightgreen;">
        <div class="container" style="margin-top: 200px; color: white;">
            
            <div class="row-md text-center mb-3">
                <div class="col">
                    <h1>Lista de Tarefas</h1>
                </div> 
            </div>    
            
            <form action="Controller/LogarUsuarioController.php" method="POST">
                <div class="row-md mt-3">
                    <div class="col-md-6 mx-auto">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Login</span>
                            </div>
                            <input name="login" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>

                    <div class="row-md mt-3">
                        <div class="col-md-6 mx-auto">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Senha</span>
                                </div>
                                <input name="senha" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-center">
                        <div class="mr-2">
                            <button type="submit" class="btn btn-light btn-lg">Logar</button>
                        </div>

                        <div class="ml-2">
                            <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button>
                        </div>
                    </div>
            </form>

            <div id="mensagemErro" class="d-flex justify-content-center bg-danger fixed-top" style="display: none;">
            </div>

            
        </div>

        <!--Modal de cadastro de usuário-->
        <!-- Modal -->
            <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalCenterTitle">Cadastrar novo usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <!--Formulário de cadastro-->
                    <form onsubmit="return validaCadastro()" action="Controller/CadastraUsuarioController.php" method="POST">
                        <div class="modal-body">
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Login</span>
                                            </div>
                                            <input id="login" name="login" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Senha</span>
                                                </div>
                                                <input id="senha" name="senha" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                            
                            </div>

                            <div id="mensagemErroCadastro" class="text-danger ml-4" style="display: none;">
                                <p>Preencha todos os campos</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>

    </body>