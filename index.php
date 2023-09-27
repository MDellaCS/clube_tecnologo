<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="admin/imagens/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" href="mural.css">
    <script type="text/javascript" src="mural.js"></script>
    <title>Mural | Clube do Tecnólogo</title>
</head>

<body>

    <div class="sticky">
        <a href="form.php">
            <input type="button" class="btn floatL" value="Entrar no Mural">
        </a>
        <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <div class="formulario">

        <h1>Mural</h1>

        <h2>Tecnólogos Recentes</h2>

        <?php
        include_once('recentes.php');
        ?>

        <h2 id="topoLista">Todos os Tecnólogos</h2>

        <?php
        include_once('todos.php');
        ?>

    </div>

</body>

</html>