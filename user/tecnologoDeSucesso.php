<?php

include_once('admin/connection.php');
//O atributo publicacao verifica se o depoimento do tecnólogo foi programado para ser publicado no site.
$publicacao = 1;
$sql = "SELECT nome, idade, ano_formacao, semestre_formacao, curso, foto, texto_sobre, texto_fatec FROM tb_tecnologo WHERE publicado=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $publicacao);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="captacaoInfoTecnologo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Casos de sucesso de Tecnólogos</title>
</head>
 
<body id="bgTecnologoSucesso">
    <div id="container relativeClass">
        <img src="imagens/fzl_logo.png" id="bg" alt="">
        <h1 class="titlePadding">Casos de sucesso da Fatec ZL</h1>
        <?php if ($user) {
            //Se existir algum registro no banco de dados com o atributo 'publicado', mostra os dados deste registro na pagina
            echo "<img src='" . $user['foto'] . "' id='fotoTecnologo' alt='' >" ?>
            <div id="dadosTecnologoPos">
                <div class="row textCentering">
                    <div class="col-sm-6">
                        <p>
                        <h5>Nome:</h5>
                        <?= $user['nome'] ?>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p>
                        <h5>Idade:</h5>
                        <?= $user['idade'] ?>
                        </p><br>
                    </div>
                </div>
                <div class="row textLarge">
                    <div class="col-sm-6">
                        <p>
                        <h5>Ano de formação:</h5>
                        <?= $user['semestre_formacao'] ?> de
                        <?= $user['ano_formacao'] ?>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p>
                        <h5>Curso realizado:</h5>
                        <?= $user['curso'] ?>
                        </p><br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h4 class="subTituloPos">Fale sobre você (O que faz e como está):</h4>
                    <p class="infoPos">
                        <?= $user['info_sobre'] ?>
                    </p>
                </div>
                <div class="carousel-item">
                    <h4 class="subTituloPos">O que a FATEC representou (ou representa) <br> para você?:</h4>
                    <p class="infoPos">
                        <?= $user['info_fatec'] ?>
                    </p>
                </div>
                <div class="carousel-item">
                    <h4 class="subTituloPos">Use esta área livre para contar sua história como tecnólogo, <br>
                        ou para adicionar qualquer observação desejada:</h4>
                    <p class="infoPos">
                        <?= $user['info_area_livre'] ?>
                    </p>
                </div>
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
        <?php
            //senão, mostra uma mensagem especial
        } else {
            echo "<div class='row textCentering'><p>Página dedicada a mostrar casos de sucesso de tecnólogos formados pela FATEC-ZL. Em breve, postaremos novo<br>
            conteúdo. Aguarde!</p></div>";
        }
        ?>
    <div>
        <img id="fatec20anosPos" src="imagens/fatec20anos.png" alt="Fatec 20 Anos">
        <img id="brasaoSaoPauloPos" src="imagens/brasaoSaoPaulo.png" alt="...">
    </div>
</body>
</html>