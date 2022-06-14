<?php include_once("../includes/header.php"); ?>

<p>Cadastro de usuários</p>
<br>

<form action="../controle/ControleUsuario.php" method="POST">

    <label for="usuario">Login: </label>
    <input type="text" name="login" placeholder="Insira o login" required><br/><br/>

    <label for="senha">Senha: </label>
    <input type="password" name="senha" placeholder="Insira o senha" required><br/><br/>

    <label for="perfil">Perfil: </label>
    <select name="perfil" id="perfil">
        <option value="cliente">Cliente</option>
        <option value="administrador">Administrador</option>
    </select>
    <br/><br/>

    <input type="submit" name="cadastrar" value="Enviar">
</form>

<ul>
    <li><a href="ViewLogin.php">Voltar para tela de login</a></li>
</ul>

<?php include_once("../includes/footer.php"); ?>