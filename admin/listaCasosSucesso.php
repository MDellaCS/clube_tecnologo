<!DOCTYPE html>
<html>

<?php

session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] == "1") {
    header('Location:loginTecnologoSucesso.php');
} else {

    ?>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="admin.css">
        <title>Clube do Técnologo - Lista de técnologos de sucesso</title>
    </head>

    <body>
        <div class="title">Egressos Cadastrados</div>

        <table>
            <tr>
                <th class="foto">Foto</th>
                <th class="nome">Nome</th>
                <th class="idade">Idade</th>
                <th class="formacao">Formação</th>
                <th class="email">Email</th>
                <th class="celular">Celular</th>
                <th class="curso">Curso Realizado</th>
                <th class="mais">Mais</th>
            </tr>

            <?php

            include_once('connection.php');
            $sql = "SELECT * FROM tbl_tecnologo";

            $result = $con->query($sql);

            if (!$result) {
                die("Query inválida! " . $con->error);
            }

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td class='foto'><a target='_blank' href='../imagens/$row[foto]'><img src='../imagens/$row[foto]'</a></td>";
                echo "<td>$row[nome]</td>";
                echo "<td>$row[idade]</td>";
                echo "<td>$row[ano_formacao]<br>$row[semestre_formacao]</td>";
                echo "<td>$row[email]</td>";
                echo "<td>$row[celular]</td>";
                echo "<td>$row[curso_realizado]</td>";
                echo "<td class='mais'><form method='post' target='_blank' action='maisdetalhes.php'><input type='hidden' name='id' value='$row[id_tecnologo]'><input type='submit' value='...'></form></td>";
                echo "</tr>";

            }
            ?>

        </table>

        <div>
            <a href="deslogar.php" class="btn btn-primary">Sair</a>
        </div>
    </body>

    <?php
}
?>

</html>