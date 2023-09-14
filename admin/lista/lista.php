<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../imagens/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="lista.css">
    <script src="lista.js"></script>
    <title>Lista de Cadastros | Clube do Tecnólogo</title>
</head>

<body>
    <div class="title">
        Egressos Cadastrados
    </div>

    <div>
        <input type="text" id="search" class="formInput" onkeyup="attBusca()" placeholder="Pesquisar por nome..."
            autocomplete="off">
    </div>

    <table>

        <tr>
            <th class="foto">Foto</th>
            <th class="nome">Nome</th>
            <th class="idade">Idade</th>
            <th class="formacao">Formação</th>
            <th class="email">Email</th>
            <th class="curso">Curso</th>
            <th class="acoes">Ações</th>
        </tr>

        <?php

        include_once('../connection.php');
        $sql = "SELECT * FROM tb_tecnologo";

        $result = $con->query($sql);

        if (!$result) {
            die("Query inválida! " . $con->error);
        }

        $count = 0;

        while ($row = $result->fetch_assoc()) {
            if ($row['ano_formacao'] == "0000") {
                $row['ano_formacao'] = "Cursando";
            } else {
                $row['semestre_formacao'] .= " de ";
            }

            $row['idade'] .= " anos";
            ?>

            <tr id="pessoa<?php echo $row['id'] ?>" class="pessoa">

                <td class="foto">
                    <img class="foto" src="../fotos/<?php echo $row['foto'] ?>">
                </td>

                <td class="nomePessoa" id="<?php echo $row['nome'] ?>">
                    <?php echo $row['nome'] ?>
                </td>

                <td>
                    <?php echo $row['idade'] ?>
                </td>

                <td>
                    <?php echo $row['semestre_formacao'] ?>
                    <?php echo $row['ano_formacao'] ?>
                </td>

                <td>
                    <?php echo $row['email'] ?>
                </td>

                <td>
                    <?php echo $row['curso'] ?>
                </td>

                <td class="acoes">
                    <img class="icon green" src="https://img.icons8.com/ios-glyphs/480/FFFFFF/checkmark--v1.png"
                        alt="asoidjoaidoia" />
                    <img class="icon yellow" src="https://img.icons8.com/android/480/FFFFFF/plus.png" alt="plus"
                        onclick="abrirModal(<?php echo $count ?>)" />
                    <img class="icon red" src="https://img.icons8.com/ios/480/FFFFFF/delete-sign--v1.png"
                        alt="delete-sign--v1" />
                </td>

            </tr>

            <div id="modal<?php echo $row['id'] ?>" class="modal" onclick="fecharModal()">
                <div class="modal-content">

                    <h1>
                        <div class="container">

                            <img class="foto2" src="../../imagens/teste_hor.png">
                            <div class="texto-sobre-imagem">
                                <?php echo $row['nome'] ?>
                            </div>

                        </div>
                    </h1>

                    <h2>
                        <div>
                            <?php echo $row['idade'] ?>
                        </div>

                        <div>
                            <?php echo $row['email'] ?>
                            <br><br>
                        </div>

                        <div>
                            <?php echo $row['curso'] ?>
                        </div>

                        <div>
                            <?php echo $row['semestre_formacao'] ?>
                            <?php echo $row['ano_formacao'] ?>
                            <br><br>
                        </div>

                        <div>
                            Texto Pessoal:
                        </div>

                        <div>
                            <h3>
                                <?php echo $row['texto_sobre'] ?>
                            </h3>
                            <br><br>
                        </div>

                        <div>
                            Texto Agradecimentos:
                        </div>

                        <div>
                            <h3>
                                <?php echo $row['texto_fatec'] ?>
                            </h3>
                        </div>
                    </h2>

                </div>
            </div>

            <?php
            $count++;
        }
        ?>

    </table>

</body>

</html>