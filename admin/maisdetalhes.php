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
        <link rel="stylesheet" href="admin2.css">
        <title>Clube do Técnologo - Lista de técnologos de sucesso</title>
    </head>

    <body>

        <?php

        $id = $_POST["id"];

        include_once('connection.php');
        $sql = "SELECT * FROM tbl_tecnologo WHERE id_tecnologo = $id";

        $result = $con->query($sql);

        if (!$result) {
            die("Query inválida! " . $con->error);
        }

        while ($row = $result->fetch_assoc()) {

            echo "<div>";
            echo "<img src='../$row[foto]'>";
            echo "<h1>$row[nome]</h1>";
            echo "<h2>$row[idade] anos</h2>";
            echo "<h2>$row[curso_realizado]</h2>";
            echo "<h2>$row[semestre_formacao] / $row[ano_formacao]</h2>";
            echo "<h3>$row[email]</h3>";
            echo "<h3>$row[celular]</h3>";
            echo "<h4>$row[info_sobre]</h4>";
            echo "<h4>$row[info_fatec]</h4>";
            echo "<h4>$row[info_area_livre]</h4>";
            echo "</div>";

        }
        ?>

        <div>
            <a href="deslogar.php" class="btn btn-primary">Sair</a>
        </div>
    </body>

    <?php
}
?>

</html>