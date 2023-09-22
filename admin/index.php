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
    <title>Login | Clube do Tecnólogo</title>

</head>

<body>

    <div>
        <img onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <form name="frmLogar" method="post" autocomplete="off" action="logarUsuario.php">

        <div class="formulario centerItems">

            <h1>Fazer Login</h1>

            <div>
                <input id="email" type="email" name="emailAdm" class="formInput" placeholder="Email" required>
                <input type="password" name="senhaAdm" class="formInput" placeholder="Senha" required>
            </div>

            <span id="erroLogin"></span>

            <div>
                <button type="submit" class="btn">Login</button>
            </div>

        </div>

    </form>

</body>

</html>