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

<body>

    <div class="sticky">
        <a href="form.php">
            <input type="button" class="btn floatL" value="Quero entrar no Mural!">
        </a>
        <img onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <div class="formulario">

        <h1>Mural</h1>

        <div class="carousel-container">
            <button class="btn" id="prevBtn" onclick="moveL()" disabled>Anterior</button>
            <button class="btn" id="nextBtn" onclick="moveR()">Próximo</button>
            <div class="carousel">
                <?php

                include_once('admin/connection.php');

                $sql = "SELECT id, nome, idade, ano_formacao, semestre_formacao, curso, foto, texto_sobre, texto_fatec, data_insercao, publicado
        FROM tb_tecnologo
        WHERE publicado = 1
        ORDER BY data_insercao ASC";

                $result = $con->query($sql);

                if (!$result) {
                    die("Query inválida! " . $con->error);
                }

                if (mysqli_num_rows($result) == 0) {
                    echo "<a href='form.php'><input type='button' class='btn' value='Nenhum tecnólogo cadastrado. Esta é a sua chance de ser o primeiro!'></a>";
                } else {

                    while ($row = $result->fetch_assoc()) {
                        if ($row['ano_formacao'] == "1901") {
                            $formacao = "Cursando " . $row['curso'];
                        } else {
                            $formacao = "Formou-se no " . $row['semestre_formacao'] . " de " . $row['ano_formacao'];
                        }

                        $primeiroUltimoNome = explode(" ", $row['nome']);
                        $primeiroUltimoNome = $primeiroUltimoNome[0] . " " . end($primeiroUltimoNome);
                        ?>

                        <div id="pessoa<?= $row['id'] ?>" class="carousel-item">

                            <div class="floatR">
                                <img src="profilePictures/<?= $row['foto'] ?>">
                            </div>

                            <h2>
                                <div class="nomePessoa" id="<?= $row['nome'] ?>">
                                    <?= $primeiroUltimoNome ?>
                                </div>

                                <div>
                                    <?= $formacao ?>
                                </div>

                            </h2>

                            <h3>
                                <div class="textos">
                                    <?= $row['texto_sobre'] ?>
                                    <?= $row['texto_fatec'] ?>
                                </div>
                            </h3>

                        </div>

                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>

</body>

</html>