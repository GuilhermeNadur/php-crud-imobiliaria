<?php

    include_once($_SERVER['DOCUMENT_ROOT']."/php-crud-imobiliaria/modelo/Imovel.class.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/php-crud-imobiliaria/util/ConectaPDO.class.php");

    class ImovelDAO {

        function __construct() {}

        public function cadastra($imovel) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("INSERT INTO imovel (nome, endereco, categoria, qtde_quartos, preco)
                        VALUES (:nome, :endereco, :categoria, :qtde_quartos, :preco)");
                $sql->bindValue(':nome', $imovel->getNome());
                $sql->bindValue(':endereco', $imovel->getEndereco());
                $sql->bindValue(':categoria', $imovel->getCategoria());
                $sql->bindValue(':qtde_quartos', $imovel->getQtde_quartos());
                $sql->bindValue(':preco', $imovel->getPreco());
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

                $sql = $conexao->prepare("SELECT * FROM imovel");
                $sql->execute();

                $arrayImoveis = array();

                for ($i = 0; $linha = $sql->fetch(PDO::FETCH_ASSOC); $i++) {

                    $imovel = new Imovel();
                    $imovel->setId($linha['ID']);
                    $imovel->setNome($linha['NOME']);
                    $imovel->setEndereco($linha['ENDERECO']);
                    $imovel->setCategoria($linha['CATEGORIA']);
                    $imovel->setQtde_quartos($linha['QTDE_QUARTOS']);
                    $imovel->setPreco($linha['PRECO']);

                    $arrayImoveis[$i] = $imovel;
                }

                $conectaPDO->fechaConexao();

                return $arrayImoveis;
                
            } catch (Exception $e) {
                echo "Erro ao tentar listar: ".$e->getMessage();
            }
        }

        public function atualiza($imovel) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("UPDATE imovel SET NOME = :nome, ENDERECO = :endereco, CATEGORIA = :categoria, QTDE_QUARTOS = :quartos,
                    PRECO = :preco WHERE ID = :id");
                $sql->bindValue(':id', $imovel->getId());
                $sql->bindValue(':nome', $imovel->getNome());
                $sql->bindValue(':endereco', $imovel->getEndereco());
                $sql->bindValue(':categoria', $imovel->getCategoria());
                $sql->bindValue(':quartos', $imovel->getQtde_quartos());
                $sql->bindValue(':preco', $imovel->getPreco());
                $sql->execute();

                $conectaPDO->fechaConexao();

            } catch (Exception $e) {
                echo "Erro ao tentar atualizar: ".$e->getMessage();
            }
        }

        public function deleta($id) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("DELETE FROM imovel WHERE id = :id");
                $sql->bindValue(':id', $id);
                $sql->execute();

                $conectaPDO->fechaConexao();

            } catch (Exception $e) {
                echo "Erro ao tentar cadastrar: ".$e->getMessage();
            }
        }

        public function busca($id) {

            try {
                $conectaPDO = new ConectaPDO();
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare('SELECT * FROM imovel WHERE id = :id');
                $sql->bindValue(':id', $id);
                $sql->execute();

                $linha = $sql->fetch(PDO::FETCH_ASSOC);
                
                $imovelRetornado = new Imovel();
                $imovelRetornado->setId($linha['ID']);
                $imovelRetornado->setNome($linha['NOME']);
                $imovelRetornado->setEndereco($linha['ENDERECO']);
                $imovelRetornado->setCategoria($linha['CATEGORIA']);
                $imovelRetornado->setQtde_quartos($linha['QTDE_QUARTOS']);
                $imovelRetornado->setPreco($linha['PRECO']);

                $conectaPDO->fechaConexao();

                return $imovelRetornado;

            } catch (Exception $e) {
                echo "Erro ao tentar buscar usuário: ".$e->getMessage();
            }
        }
    }
?>
