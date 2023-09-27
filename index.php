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

        <?php
        include_once('admin/connection.php');
        $isEmpty = getRegistros($con, '');

        if (empty($isEmpty)) {
            echo "<h2>Nenhum tecnólogo encontrado.</h2>";
        } else {
            ?>

            <h2>Tecnólogos Recentes</h2>

            <div class="carousel">
                <?php
                include_once('admin/connection.php');
                $recentes = getRegistros($con, 'LIMIT 5');

                foreach ($recentes as $row) {
                    renderizarRegistro($row, true);
                }
                ?>
            </div>

            <h2>Todos os Tecnólogos </h2>

            <div class="lista">
                <?php
                $todosRegistros = getRegistros($con, '');

                $count = 0;
                foreach ($todosRegistros as $row) {
                    renderizarRegistro($row, false);
                    $count++;
                }
                ?>
            </div>

            <div class="centerItems">
                <img id="btnPrev" class="icon btn" onclick="prevLista()">
                <img id="btnNext" class="icon btn" onclick="nextLista()">
            </div>

        <?php } ?>

    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <script type="text/javascript" src="carousel.js"></script>

</body>

</html>

<?php
function getRegistros($con, $limit)
{
    $sql = "SELECT id, nome, idade, ano_formacao, semestre_formacao, curso, foto, texto_sobre, texto_fatec
            FROM tb_tecnologo
            WHERE publicado = 1
            ORDER BY data_insercao DESC, id ASC
            $limit";

    $result = $con->query($sql);

    if (!$result) {
        die("Query inválida! " . $con->error);
    }

    $registros = [];
    while ($row = $result->fetch_assoc()) {
        $registros[] = $row;
    }

    return $registros;
}

function renderizarRegistro($row, $carousel)
{
    if ($row['ano_formacao'] == "1901") {
        $formacao = "Cursando " . $row['curso'];
    } else {
        $formacao = "Formou-se no " . $row['semestre_formacao'] . " de " . $row['ano_formacao'] . "<br>em " . $row['curso'];
    }

    if ($carousel) {
        ?>
        <div id="pessoa<?= $row['id'] ?>" class="carousel-item">
            <div class="floatR">
                <img src="profilePictures/<?= $row['foto'] ?>">
            </div>
            <h2>
                <?= $row['nome'] ?>
            </h2>
            <h3 class="centerItems">
                <?= $formacao ?>
            </h3>
            <h3>
                <div class="textos">
                    <div>
                        <?= $row['texto_sobre'] ?>
                    </div>
                    <div>
                        <?= $row['texto_fatec'] ?>
                    </div>
                </div>
            </h3>
        </div>
        <?php
    } else {
        ?>
        <div id="pessoa<?= $row['id'] ?>" class="lista-item">
            <div class="floatR">
                <img src="profilePictures/<?= $row['foto'] ?>">
            </div>
            <h2>
                <?= $row['nome'] ?>
            </h2>
            <h3>
                <?= $row['idade'] ?> anos
                <br><br>
                <?= $formacao ?>
            </h3>

            <img class="icon btn" src="https://img.icons8.com/android/480/FFFFFF/plus.png"
                onclick="abrirModal(<?= $count ?>)" />

        </div>
        <?php
    }
}
?>