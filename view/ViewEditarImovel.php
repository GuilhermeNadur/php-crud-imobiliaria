<?php
    include_once("../includes/header.php");
	include_once("../modelo/Usuario.class.php");
    include_once("../modelo/Imovel.class.php");
	include_once("../dao/ImovelDAO.class.php");
?>

<?php
	session_start();
    $usuario = $_SESSION['usuario'];
	
    if (!isset($usuario) || $usuario->getPerfil() !== "administrador") {
        header("Location: ViewErroNaoAutorizado.php");
    }
?>

<?php
	$id = $_GET['id'];
	$imovelDAO = new ImovelDAO();
	$imovel = $imovelDAO->busca($id);
?>

<a href="ViewHome.php">Voltar para home</a>
<br/><br/>

<form action="../controle/ControleImovel.php" method="POST">
	<table border="0">
		<tr> 
            <td>Nome</td>
            <td><input type="text" name="nome" value="<?php echo $imovel->getNome();?>" required></td>
        </tr>
        <tr> 
            <td>Endereço</td>
            <td><input type="text" name="endereco" value="<?php echo $imovel->getEndereco();?>" required></td>
        </tr>
        <tr> 
            <td>Categoria</td>
            <td><input type="text" name="categoria" value="<?php echo $imovel->getCategoria();?>" required></td>
        </tr>
        <tr> 
            <td>Quantidade de Quartos</td>
            <td><input type="number" name="quartos" value="<?php echo $imovel->getQtde_quartos();?>" required></td>
        </tr>
        <tr> 
            <td>Preço</td>
            <td><input type="number" name="preco" value="<?php echo $imovel->getPreco();?>" required></td>
        </tr>
        <tr> 
			<td><input type="hidden" name="id" value="<?php echo $imovel->getId();?>"></td>
            <td><input type="submit" name="atualizar" value="Atualizar"></td>
        </tr>
	</table>
</form>

<?php include_once("../includes/footer.php"); ?>
