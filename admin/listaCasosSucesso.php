<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="admin.css">
        <script src="lista.js"></script>
        <title>Clube do Técnologo - Lista de Técnologos de Cadastrados</title>
    </head>

    <body>
        <div class="title">Egressos Cadastrados</div>

        <table>
        <input type="text" id="search" onkeyup="attBusca()" placeholder="Pesquisar por nome..." autocomplete="off">
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
            $sql = "SELECT * FROM tb_tecnologo";

            $result = $con->query($sql);

            if (!$result) {
                die("Query inválida! " . $con->error);
            }

            $count = 0;

            while ($row = $result->fetch_assoc()) {

                echo "<tr id='pessoa$row[id]' class='pessoa'>";
                echo "<td class='foto'><a target='_blank' href='../fotos/$row[foto]'><img src='../fotos/$row[foto]'</a></td>";
                echo "<td id='$row[nome]' class='nomePessoa'>$row[nome]</td>";
                echo "<td>$row[idade]</td>";
                echo "<td>$row[ano_formacao]<br>$row[semestre_formacao]</td>";
                echo "<td>$row[email]</td>";
                echo "<td>$row[celular]</td>";
                echo "<td>$row[curso]</td>";
                echo "<td class='mais'><input type='button' value='...' onclick='on($count)'></td>";
                echo "</tr>";

                echo "<div id='overlay$row[id]' class='overlay' onclick='off()'>

                    <div class='foto'><a target='_blank' href='../fotos/$row[foto]'><img src='../fotos/$row[foto]'></a></div>
                    <div>$row[nome]</div>
                    <div>$row[idade]</div>
                    <div>$row[ano_formacao]<br>$row[semestre_formacao]</div>
                    <div>$row[email]</div>
                    <div>$row[celular]</div>
                    <div>$row[curso]</div>
                    <div>$row[texto_sobre]</div>
                    <div>$row[texto_fatec]</div>

                </div>";

                $count++;

            }

            ?>

        </table>

    </body>

</html>