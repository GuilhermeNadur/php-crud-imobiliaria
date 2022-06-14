<?php
    include_once("../includes/header.php");
    include_once("../modelo/Usuario.class.php");
?>

<?php
	session_start();
    $usuario = $_SESSION['usuario'];
	
    if (!isset($usuario) || $usuario->getPerfil() !== "administrador") {
        header("Location: erro-nao-autorizado.php");
    }
?>

<a href="ViewHome.php">Voltar para home</a>
<br/><br/>

<form action="../controle/ControleImovel.php" method="POST">
    <table width="25%" border="0">
        <tr> 
            <td>Nome</td>
            <td><input type="text" name="nome" required></td>
        </tr>
        <tr> 
            <td>Endereço</td>
            <td><input type="text" name="endereco" required></td>
        </tr>
        <tr> 
            <td>Categoria</td>
            <td><input type="text" name="categoria" required></td>
        </tr>
        <tr> 
            <td>Quantidade de Quartos</td>
            <td><input type="number" name="quartos" required></td>
        </tr>
        <tr> 
            <td>Preço</td>
            <td><input type="number" name="preco" required></td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" name="cadastrar" value="Enviar"></td>
        </tr>
    </table>
</form>

<?php include_once("../includes/footer.php"); ?>
