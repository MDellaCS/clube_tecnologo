<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
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

    <table>

        <tr>
            <th class="foto">Foto</th>
            <th class="nome">
                <div>
                    <input type="text" id="search" class="formInput center" onkeyup="attBusca()" placeholder="Nome"
                        autocomplete="off">
                </div>
            </th>
            <th class="formacao">Formação</th>
            <th class="email">Email</th>
            <th class="curso">Curso</th>
            <th class="publicado">Publicado</th>
            <th class="acoes">Ações</th>
        </tr>

        <?php

        include_once('../connection.php');
        $sql = "SELECT id, nome, idade, ra, ano_formacao, semestre_formacao, email, curso, foto, texto_sobre, texto_fatec, publicado FROM tb_tecnologo";

        $result = $con->query($sql);

        if (!$result) {
            die("Query inválida! " . $con->error);
        }

        $count = 0;

        while ($row = $result->fetch_assoc()) {
            if ($row['ano_formacao'] == "1901") {
                $row['ano_formacao'] = "Cursando";
            } else {
                $row['semestre_formacao'] .= " de ";
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
                    <img class="foto" src="../../user/profilePictures/<?= $row['foto'] ?>">
                </td>

                <td class="nomePessoa" id="<?= $row['nome'] ?>">
                    <?= $row['nome'] ?>
                </td>

                <td>
                    <?= $row['semestre_formacao'] ?>
                    <?= $row['ano_formacao'] ?>
                </td>

                <td>
                    <?= $row['email'] ?>
                </td>

                <td>
                    <?= $row['curso'] ?>
                </td>

                <td>
                    <?= $row['publicado'] ?>
                </td>

                <td class="acoes center">

                    <img class="icon green" src="https://img.icons8.com/ios-glyphs/480/FFFFFF/checkmark--v1.png"
                        onclick="abrirPublicar(<?= $row['id'] ?>)" />

                    <div id="confirmPublicar<?= $row['id'] ?>" class="modal">
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

                    <img class="icon yellow" src="https://img.icons8.com/android/480/FFFFFF/plus.png"
                        onclick="abrirModal(<?= $count ?>)" />

                    <img class="icon red" src="https://img.icons8.com/ios/480/FFFFFF/delete-sign--v1.png"
                        onclick="abrirDeletar(<?= $row['id'] ?>)" />

                    <div id="confirmDeletar<?= $row['id'] ?>" class="modal">
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

            <div id="modal<?= $row['id'] ?>" class="modal" onclick="fecharModal()">
                <div class="modal-content">

                    <h1>
                        <div class="container">

                            <img class="foto2" src="../../user/profilePictures/<?= $row['foto'] ?>">
                            <div class="texto-sobre-imagem">

                                <?= $primeiroUltimoNome ?>
                            </div>

                        </div>
                    </h1>

                    <h2>
                        <div>
                            <?= $row['idade'], " anos" ?>
                        </div>

                        <div>
                            <?= $row['email'] ?>
                        </div>

                        <div>
                            <?= $row['ra'] ?>
                        </div>

                        <div>
                            <?= $row['curso'] ?>
                        </div>

                        <div>
                            <?= $row['semestre_formacao'] ?>
                            <?= $row['ano_formacao'] ?>
                            <br><br>
                        </div>

                        <div>
                            Texto Pessoal:
                        </div>

                        <div>
                            <h3>
                                <?= $row['texto_sobre'] ?>
                            </h3>
                        </div>

                        <div>
                            Texto Agradecimentos:
                        </div>

                        <div>
                            <h3>
                                <?= $row['texto_fatec'] ?>
                            </h3>
                        </div>
                    </h2>

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