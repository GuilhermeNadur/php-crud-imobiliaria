<?php
    include_once("../dao/UsuarioDAO.class.php");

    session_start();

    if (isset($_POST['logar'])) {

        try {
            $login = $_POST['login'];
            $senha = $_POST['password'];
    
            $usuario = new Usuario();
            $usuario->setLogin($login);
            $usuario->setPassword($senha);
    
            $usuarioDAO = new UsuarioDAO();
            $usuarioBuscado = $usuarioDAO->busca($usuario);

            if ($usuarioBuscado->getId() !== null) {
                $_SESSION['usuario'] = $usuarioBuscado;
                header("Location: ../view/ViewHome.php");

            } else {
                $_SESSION['mensagem'] = "Login e/ou senha inválido!";
                header("Location: ../view/ViewLogin.php");
            }

        } catch (Exception $e) {
            $_SESSION['mensagem'] = "Erro ao efetuar login: ".$e->getMessage();
            header("Location: ../view/ViewLogin.php");
        }

    } else if (isset($_POST['deslogar'])) {
        unset($_SESSION['usuario']);
        header("Location: ../view/ViewLogin.php");
    }
?>
