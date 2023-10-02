<?php

session_start();

include_once('connection.php');

$sql = "SELECT id
        FROM tb_admin";

$result = $con->query($sql);

if($result->num_rows === 0){
    $_SESSION["email"] = "admin";
    $_SESSION["senha"] = "admin";
}

if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit();
} else {

    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="../form.css">
        <script src="../form.js"></script>
        <title>Cadastro | Clube do Tecnólogo</title>
    </head>

    <body>

        <div id="btns" class="sticky">
            <a href="index.php">
                <input id="btnForm" type="button" class="btn floatL" value="Voltar">
            </a>
            <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
        </div>

        <form name="frmCriar" method="post" autocomplete="on" action=<?= htmlspecialchars('criarUsuarioResult.php'); ?>>
            <div class="formulario centerItems">
                <h1>Cadastrar Admin</h1>
                <?php
                if (isset($_GET["error"])) {
                    echo "<h2 class='centerItems' style='color: red;'>Login falhou. Por favor, verifique suas credenciais.</h2>";
                }
                ?>
                <div>
                    <input id="nome" type="text" name="nomeAdm" class="formInput" placeholder="Nome" required>
                    <input id="email" type="email" name="emailAdm" class="formInput" placeholder="Email" required>
                    <input type="password" name="senhaAdm" class="formInput" placeholder="Senha" required>
                </div>
                <span id="erroLogin"></span>
                <div>
                    <button type="submit" class="btn">Cadastrar</button>
                </div>
            </div>
        </form>
    </body>

    </html>

    <?php
}
?>