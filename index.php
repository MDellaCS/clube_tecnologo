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

    <div id="btns" class="sticky">
        <a href="form.php">
            <input id="btnForm" type="button" class="btn floatL" value="Entrar no Mural">
        </a>
        <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <div class="formulario">

        <h1>Mural</h1>

        <div id="recentes" style="position: relative">
            <h2>Tecnólogos Recentes</h2>

            <?php
            include_once('recentes.php');
            ?>
        </div>
        <b id="alvo" class="alvo"></b>
        <div id="todos" style="position: relative">
            <h2>Todos os Tecnólogos</h2>

            <?php
            include_once('todos.php');
            ?>
        </div>

        <div id="mobile" class="modal" onclick="fecharModal()">
            <div class="modal-content modal-mobile centerItems">
                <h1 style="color: red;">Alerta!</h1>
                <h1>Parece que você está acessando o Clube do Tecnólogo em um dispositivo móvel. Recomendamos que
                    você use nosso site em um PC (computador) sempre que possível para obter a melhor experiência. Caso
                    esteja usando um dispositivo móvel, sugerimos que gire o seu dispositivo para a posição horizontal
                    para aproveitar ao máximo a nossa plataforma. Obrigado por escolher o Clube do Tecnólogo!</h1><br>
                <img class="img" src="https://img.icons8.com/ios-filled/480/rotate-screen.png">
            </div>
        </div>

        <div id="init1" class="modal" onclick="fecharModal(1)">
            <div class="init1">
                Aqui está o formulário para entrar no mural e, lá na direita, o modo claro/escuro.<br>
                <h4>(clique para continuar)</h4>
            </div>
        </div>

        <div id="init2" class="modal" onclick="fecharModal(2)">
            <div class="init2">
                Aqui aparecem os 5 tecnólogos mais recentes. Você pode arrastar para o lado.
            </div>
        </div>

        <div id="init3" class="modal" onclick="fecharModal()">
            <div class="init3">
                E aqui se encontram todos os tecnólogos do sistema.<br>
                Se você está aqui, obrigado!
            </div>
        </div>

    </div>

    <?php include_once('footer.html'); ?>

</body>

</html>