<?php
    
    require_once "../Model/Usuario.php";
    require_once "../Model/BD.php";

    $bd = new BD();
    $usuario = new Usuario($_POST['login'], $_POST['senha'], null);

    if($bd->adicionaUsuario($usuario)){
        header('Location: ../index.php?sucesso');
    }
    else{
        header('Location: ../index.php?Erro=UsuarioExiste');
    }
?>