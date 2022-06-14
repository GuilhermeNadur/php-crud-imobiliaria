<?php
    include_once("../dao/ImovelDAO.class.php");

    session_start();

    if (isset($_POST['cadastrar'])) {
        
        try {
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $categoria = $_POST['categoria'];
            $qtde_quartos = $_POST['quartos'];
            $preco = $_POST['preco'];

            $imovel = new Imovel();
            $imovel->setNome($nome);
            $imovel->setEndereco($endereco);
            $imovel->setCategoria($categoria);
            $imovel->setQtde_quartos($qtde_quartos);
            $imovel->setPreco($preco);

            $imovelDAO = new ImovelDAO();
            $imovelDAO->cadastra($imovel);

            $_SESSION['mensagem'] = "Imóvel cadastrado com sucesso";
            header("Location: ../view/ViewHome.php");

        } catch (Exception $e) {
            $_SESSION['mensagem'] = "Erro ao cadastrar imóvel: ".$e->getMessage();
            header("Location: ../view/ViewHome.php");
        }
    
    } else if (isset($_POST['atualizar'])) {

        try {
            $imovel = new Imovel();
            $imovel->setId($_POST['id']);
            $imovel->setNome($_POST['nome']);
            $imovel->setEndereco($_POST['endereco']);
            $imovel->setCategoria($_POST['categoria']);
            $imovel->setQtde_quartos($_POST['quartos']);
            $imovel->setPreco($_POST['preco']);

            $imovelDAO = new ImovelDAO();
            $imovelDAO->atualiza($imovel);

            $_SESSION['mensagem'] = "Imóvel atualizado com sucesso";
            header("Location: ../view/ViewHome.php");

        } catch (Exception $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar imóvel: ".$e->getMessage();
            header("Location: ../view/ViewHome.php");
        }

    } else if (isset($_POST['deletar'])) {

        try {
            $id = $_POST['id'];

            $imovelDAO = new ImovelDAO();
            $imovelDAO->deleta($id);

            $_SESSION['mensagem'] = "Imóvel deletado com sucesso";
            header("Location: ../view/ViewHome.php");

        } catch (Exception $e) {
            $_SESSION['mensagem'] = "Erro ao deletar imóvel: ".$e->getMessage();
            header("Location: ../view/ViewHome.php");
        }
    }
?>
