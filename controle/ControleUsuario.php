<?php
    include_once("../dao/UsuarioDAO.class.php");

    session_start();

    if (isset($_POST['cadastrar'])) {
        
        try {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $perfil = $_POST['perfil'];
    
            $usuario = new Usuario();
            $usuario->setLogin($login);
            $usuario->setPassword($senha);
            $usuario->setPerfil($perfil);
    
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->cadastra($usuario);
    
            $_SESSION['mensagem'] = "Usuário cadastrado com sucesso";
            header("Location: ../view/ViewLogin.php");
    
        } catch (Exception $e) {
            $_SESSION['mensagem'] = "Erro ao cadastrar usuário: ".$e->getMessage();
            header("Location: ../view/ViewLogin.php");
        } 
    }
?>
