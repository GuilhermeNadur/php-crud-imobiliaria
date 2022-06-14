<?php
    include_once("../includes/header.php");

    session_start();
    unset($_SESSION['usuario']);

    if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        echo '<p>'. $mensagem. '</p>';
        unset($_SESSION['mensagem']);
    }
?>

<p>Logar-se</p>
<br>
<form action="../controle/ControleLogin.php" method="POST">
    <label for="usuario">LOGIN: </label>
    <input type="text" name="login" id="usuario" placeholder="Informe seu usuário" required>
    <br><br>
    <label for="senha">SENHA: </label>
    <input type="password" name="password" id="senha" placeholder="Informe sua senha" required>
    <br><br>
    <input type="submit" name="logar" value="Entrar">
</form><br>

<ul>
    <li><a href="ViewNovoUsuario.php">Cadastrar usuário</a></li>
    <li><a href="#">Esqueceu sua senha?</a></li>
</ul>

<?php include_once("../includes/footer.php"); ?>
