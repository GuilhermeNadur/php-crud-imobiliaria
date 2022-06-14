<?php

    class ConectaPDO {
        
        private $conexao;

        public function  abreConexao() {

            try {
                $conexao = new PDO('mysql:host=localhost;dbname=crud_imobiliaria','root','root');
                return $conexao;

            } catch (PDOException $e) {
                echo "Erro ao tentar abrir uma conexão: ".$e->getMessage();
                die();
            }
        }

        public function fechaConexao() {
            $conexao = null;
        }
    }
?>
