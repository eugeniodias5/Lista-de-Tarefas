<?php

    require_once "../Model/Usuario.php";
    require_once "../Model/BD.php";

    $usuario = new Usuario($_POST['login'], $_POST['senha'], null);
    $bd = new BD();
    
    //Verificando se o usuário existe
    $usuarioBanco = $bd->recuperaUsuario($usuario);

    if(empty($usuarioBanco) || ($usuario->senha != $usuarioBanco->senha)){
        header('Location: ../index.php?Erro=UsuarioIncorreto');
    }

    else{
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = new Usuario($usuarioBanco->login, $usuarioBanco->senha, $usuarioBanco->idUsuario);
        header('Location: ../View/menuView.php');
    }


?>