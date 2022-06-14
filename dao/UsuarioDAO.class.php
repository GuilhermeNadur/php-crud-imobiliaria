<?php

    include_once("../modelo/Usuario.class.php");
    include_once("../util/ConectaPDO.class.php");

    class UsuarioDAO {

        function __construct() {}

        public function cadastra($usuario) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("INSERT INTO usuario (login, password, perfil)
                        VALUES (:login, :password, :perfil)");
                $sql->bindValue(':login', $usuario->getLogin());
                $sql->bindValue(':password', $usuario->getPassword());
                $sql->bindValue(':perfil', $usuario->getPerfil());
                $sql->execute();

                $conectaPDO->fechaConexao();

            } catch (Exception $e) {
                echo "Erro ao tentar cadastrar: ".$e->getMessage();
            }
        }

        public function lista() {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("SELECT * FROM usuario");
                $sql->execute();

                $arrayUsuarios = array();

                for ($i = 0; $linha = $sql->fetch(PDO::FETCH_ASSOC); $i++) {

                    $usuario = new Usuario();
                    $usuario->setId($linha['ID']);
                    $usuario->setLogin($linha['LOGIN']);
                    $usuario->setPassword($linha['PASSWORD']);
                    $usuario->setPerfil($linha['PERFIL']);

                    $arrayUsuarios[$i] = $usuario;
                }

                $conectaPDO->fechaConexao();

                return $arrayUsuarios;
                
            } catch (Exception $e) {
                echo "Erro ao tentar listar: ".$e->getMessage();
            }
        }

        public function busca($usuario) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $stmt = $conexao->prepare('SELECT * FROM usuario WHERE login = :login AND password = :password');
                $stmt->execute(array(':login' => $usuario->getLogin(), ':password' => $usuario->getPassword()));

                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $usuarioRetornado = new Usuario();
                $usuarioRetornado->setId($linha['ID']);
                $usuarioRetornado->setLogin($linha['LOGIN']);
                $usuarioRetornado->setPassword($linha['PASSWORD']);
                $usuarioRetornado->setPerfil($linha['PERFIL']);

                $conectaPDO->fechaConexao();

                return $usuarioRetornado;

            } catch (Exception $e) {
                echo "Erro ao tentar buscar usuário: ".$e->getMessage();
            }
        }
    }
?>
