<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
</head>

<body>

    <?php
    include_once('admin/connection.php');

    $currentPage = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
    $itemsPerPage = 4 * 6;

    $offset = ($currentPage - 1) * $itemsPerPage;

    $sql = "SELECT id, nome, idade, ano_formacao, semestre_formacao, curso, foto, texto_sobre, texto_fatec
            FROM tb_tecnologo
            WHERE publicado = 1
            ORDER BY data_insercao DESC, id ASC
            LIMIT $offset, $itemsPerPage";

    $result = $con->query($sql);

    if (!$result) {
        die("Query inválida! " . $con->error);
    }

    ?>
    <div class="lista">
        <?php

        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($row['ano_formacao'] == "1901") {
                $formacao = "Cursando " . $row['curso'];
            } else {
                $formacao = "Formou-se no " . $row['semestre_formacao'] . " de " . $row['ano_formacao'] . "<br>em " . $row['curso'];
            }

            ?>

            <div id="pessoa<?= $row['id'] ?>" class="lista-item" onclick="abrirModal(<?= $count ?>)">
                <div class="floatR">
                    <img src="profilePictures/<?= $row['foto'] ?>">
                </div>
                <h2>
                    <?= $row['nome'] ?>
                </h2>
                <h3>
                    <?= $row['idade'] ?> anos
                </h3>
                <h3 class="centerItems">
                    <?= $formacao ?>
                </h3>
            </div>

            <div id="modal<?= $count ?>" class="modal" onclick="fecharModal()">
                <div class="modal-content">
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
            </div>

            <?php
            $count++;
        }

        ?>
    </div>

    <div class="centerItems">
        <?php
        if ($currentPage > 1) {
            $prevPage = $currentPage - 1;
            echo "<a href='index.php?pagina=$prevPage'><img id='btnPrev' class='icon btn'/></a>";
        }
        $nextPage = $currentPage + 1;
        if ($result->num_rows == $itemsPerPage) {
            echo "<a href='index.php?pagina=$nextPage'><img id='btnNext' class='icon btn'/></a>";
        }
        ?>
    </div>

    <?php
    if ($count == 0) {
        echo "<h1>Nenhum registro encontrado</h1>";
    }
    ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="carousel.js"></script>

</body>

</html>