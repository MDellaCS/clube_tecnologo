<?php

session_start();

if (!isset($_SESSION["email"]) && !isset($_SESSION["senha"])) {
    header("Location: index.php");
    exit();
} else {

    ?>

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
        <link rel="stylesheet" href="lista.css">
        <script src="lista.js"></script>
        <title>Lista de Cadastros | Clube do Tecnólogo</title>
    </head>

    <body>

        <div>
            <a href="index.php">
                <input type="button" class="btn floatL" value="Voltar">
            </a>
            <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
        </div>

        <table>

            <tr class="sticky">
                <th class="foto">Foto</th>
                <th class="nome">
                    <div>
                        <input type="text" id="search" class="formInput center" onkeyup="attBusca()"
                            placeholder="Pesquisar Nome" autocomplete="off">
                    </div>
                </th>
                <th class="formacao">Formação</th>
                <th class="email">Email</th>
                <th class="publicado">Publicado</th>
                <th class="acoes">Ações</th>
            </tr>

            <?php

            include_once('connection.php');
            $sql = "SELECT id, nome, idade, ano_formacao, semestre_formacao, email, curso, foto, texto_sobre, texto_fatec, publicado
                    FROM tb_tecnologo
                    ORDER BY publicado ASC";

            $result = $con->query($sql);

            if (!$result) {
                die("Query inválida! " . $con->error);
            }

            $count = 0;

            while ($row = $result->fetch_assoc()) {
                if ($row['ano_formacao'] == "1901") {
                    $formacao = "Cursando " . $row['curso'];
                } else {
                    $formacao = "Formou-se no " . $row['semestre_formacao'] . " de " . $row['ano_formacao'] . "<br>em " . $row['curso'];
                }

                if ($row['publicado'] == 0) {
                    $row['publicado'] = "Não";
                } else {
                    $row['publicado'] = "Sim";
                }

                $primeiroUltimoNome = explode(" ", $row['nome']);
                $primeiroUltimoNome = $primeiroUltimoNome[0] . " " . end($primeiroUltimoNome);
                ?>

                <tr id="pessoa<?= $row['id'] ?>" class="pessoa">

                    <td class="foto">
                        <img class="foto" src="../profilePictures/<?= $row['foto'] ?>">
                    </td>

                    <td class="nomePessoa" id="<?= $row['nome'] ?>">
                        <?= $row['nome'] ?>
                    </td>

                    <td>
                        <?= $formacao ?>
                    </td>

                    <td>
                        <?= $row['email'] ?>
                    </td>

                    <td>
                        <?= $row['publicado'] ?>
                    </td>

                    <td class="acoes center">

                        <img class="icon green" onclick="abrirPublicar(<?= $row['id'] ?>)" />

                        <div id="confirmPublicar<?= $row['id'] ?>" class="modal" onclick="fecharModal()">
                            <div class="modal-content">
                                <h1>Deseja publicar
                                    <?= $row['nome'] ?>?
                                </h1>
                                <div style="text-align: center;">
                                    <input type="button" class="btn"
                                        onclick="alterarCadastro(<?= $row['id'] ?>, 'publicarCadastro.php')" value="Sim">
                                    <input type="button" class="btn" onclick="fecharModal()" value="Não">
                                </div>
                            </div>
                        </div>

                        <img class="icon yellow" onclick="abrirModal(<?= $count ?>)" />

                        <img class="icon red" onclick="abrirDeletar(<?= $row['id'] ?>)" />

                        <div id="confirmDeletar<?= $row['id'] ?>" class="modal" onclick="fecharModal()">
                            <div class="modal-content">
                                <h1>Deseja deletar
                                    <?= $row['nome'] ?>?
                                </h1>
                                <div style="text-align: center;">
                                    <input type="button" class="btn"
                                        onclick="alterarCadastro(<?= $row['id'] ?>, 'deletarCadastro.php')" value="Sim">
                                    <input type="button" class="btn" onclick="fecharModal()" value="Não">
                                </div>
                            </div>
                        </div>

                    </td>

                </tr>

                <div id="modal<?= $count ?>" class="modal" onclick="fecharModal()">
                    <div class="modal-content">
                        <div class="floatR">
                            <img class="foto2" src="../profilePictures/<?= $row['foto'] ?>">
                        </div>
                        <h1 class="centerItems">
                            <?= $row['nome'] ?>
                        </h1>
                        <h2>
                            <?= $row['idade'] ?> anos
                        </h2>
                        <h2>
                            <?= $row['email'] ?>
                        </h2>
                        <h2>
                            <?= $formacao ?>
                        </h2>
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
            if ($count == 0) {
                echo "<h1>Nenhum registro encontrado</h1>";
            }
            ?>

        </table>

    </body>

    </html>

    <?php
}
?>