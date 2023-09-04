<?php

include_once('connection.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="loginTecnologoSucesso.css">
    <title>Login Clube do Tecnólogo</title>
    <?php
    session_start();
    if (isset($_SESSION["login"]) && $_SESSION["login"] == "0") {
        echo "<script>
                function alerta() {
                    alert('Login não encontrado ou não aprovado.');
                }
            </script>";
    }
    if (isset($_SESSION["novousuario"]) && $_SESSION["novousuario"] == "1") {
        echo "<script>
        function alerta() {
            alert('Seus dados foram enviados e estão sujeitos a análise e aprovação.');
        }
        </script>";
    }
    unset($_SESSION['novousuario']);
    unset($_SESSION['login']);
    session_destroy();

    ?>
    
</head>

<body onload="alerta()">

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <p id="mensagemInicialLogin">Preencha seus dados para ter acesso ao sistema Tecnólogos de Sucesso da FATEC-ZL.<br>
                Seu login passará por análise e, se aprovado, você terá acesso liberado.</p>
            <form name="frmUsuario" method="post" action="novoUsuario.php">
                <input type="text" name="nm_enviar_nome" placeholder="Nome Completo" required>
                <input type="text" name="nm_enviar_email" placeholder="Email" required>
                <input type="password" name="nm_enviar_password" placeholder="Password" required>
                <button type="submit">Enviar Dados</button>
            </form>
        </div>

        <div class="login"><label for="chk" aria-hidden="true">Fazer Login</label>
            <form name="frmLogar" method="post" action="logarUsuario.php">
                <input type="email" name="nm_email" placeholder="Email" required>
                <input type="password" name="nm_senha" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
</body>
</div>

</html>