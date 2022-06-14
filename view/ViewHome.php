<?php
	include_once("../includes/header.php");
	include_once("../modelo/Usuario.class.php");
	include_once("../dao/ImovelDAO.class.php");

	session_start();
    $usuario = $_SESSION['usuario'];
	
    if (!isset($usuario) || $usuario->getPerfil() !== "administrador") {
        header("Location: ViewErroNaoAutorizado.php");
    }

	$imovelDAO = new ImovelDAO();
	$arrayImoveis = $imovelDAO->lista();
?>

<?php
	if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        echo '<font color=\'green\'>'. $mensagem. '</font></p>';
        unset($_SESSION['mensagem']);
    }
?>

<a href="ViewNovoImovel.php">Adicionar Novo Imóvel</a><br/><br/>

<table width='100%' border=0>

	<tr bgcolor='#b3d9e8'>
		<td>Nome</td>
		<td>Endereço</td>
		<td>Categoria</td>
		<td>Quantidade de Quartos</td>
		<td>Preço</td>
		<td>Ações</td>
	</tr>

	<?php
		for ($i = 0; $i < count($arrayImoveis); $i++) {
			$imovel = $arrayImoveis[$i];
            echo "<tr>";
            echo "<td>".$imovel->getNome()."</td>";
            echo "<td>".$imovel->getEndereco()."</td>";
            echo "<td>".$imovel->getCategoria()."</td>";
			echo "<td>".$imovel->getQtde_quartos()."</td>";
			echo "<td>".$imovel->getPreco()."</td>";
            echo "<td><a href=\"ViewEditarImovel.php?id=".$imovel->getId()."\">Editar</a> | 
				<form action=\"../controle/ControleImovel.php\" method=\"POST\">
					<input type=\"hidden\" name=\"id\" value=".$imovel->getId().">
					<button type=\"submit\" name=\"deletar\" value=\"Deletar\">Deletar</button>
				</form></td>";
        }
	?>
</table>

<br><br>
<form action="../controle/ControleLogin.php" method="POST">
	<button type="submit" name="deslogar" value="Logout">Efetuar Logout</button>
</form>

<?php include_once("../includes/footer.php"); ?>
