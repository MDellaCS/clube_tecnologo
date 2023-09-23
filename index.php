<?php

include_once('admin/connection.php');
$sql = "SELECT nome, idade, ano_formacao, semestre_formacao, curso, foto, texto_sobre, texto_fatec FROM tb_tecnologo WHERE publicado = 1";
$result = $con->query($sql);

if (!$result) {
    die("Query inválida!" . $con->error);
}
?>

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

    <link rel="stylesheet" href="mural.css">
    <script src="mural.js"></script>
    <title>Mural | Clube do Tecnólogo</title>
</head>

<body id="bgTecnologoSucesso">

    <a href="form.php">
        <input type="button" class="btn" value="Formulário">
    </a>

    <div id="container relativeClass">
        <img src="../admin/imagens/fzl_logo.png" id="bg" alt="">
        <h1 class="titlePadding">Casos de sucesso de Tecnólogos</h1>
        <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $first = true;
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
                    $first = false;
                    ?>
                    <img src="profilePictures/<?php echo $row['foto'] ?>" id="fotoTecnologo" alt="">
                    <div id="dadosTecnologoPos">
                        <div class="row textCentering">
                            <div class="col-sm-6">
                                <p>
                                <h5>Nome:</h5>
                                <?= $row['nome'] ?>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                <h5>Idade:</h5>
                                <?= $row['idade'] ?>
                                </p><br>
                            </div>
                        </div>
                        <div class="row textLarge">
                            <div class="col-sm-6">
                                <p>
                                <h5>Ano de formação:</h5>
                                <?= $row['semestre_formacao'] ?> de
                                <?= $row['ano_formacao'] ?>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                <h5>Curso realizado:</h5>
                                <?= $row['curso'] ?>
                                </p><br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <h4 class="subTituloPos">Fale sobre você (O que faz e como está):</h4>
                    <p class="infoPos">
                        <?= $row['texto_sobre'] ?>
                    </p>
                    <h4 class="subTituloPos">O que a FATEC representou (ou representa) <br> para você?:</h4>
                    <p class="infoPos">
                        <?= $row['texto_fatec'] ?>
                    </p>
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <p id="dicaPos">*Mantenha o cursor sobre o slide para parar o rolamento automático.</p>
    </div>
    </div>

</body>

</html>