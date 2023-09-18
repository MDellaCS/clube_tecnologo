<?php

$id = $_POST['id'];

include_once('../connection.php');

// -------------------- APAGAR A IMAGEM NO DIRETÓRIO --------------------

$sql = "SELECT foto FROM tb_tecnologo WHERE id = $id";

$result = $con->query($sql);

if (!$result) {
    die("Query inválida! " . $con->error);
}

$row = $result->fetch_assoc();
$caminhoArquivo = "../../profilePictures/" . $row['foto'];

unlink($caminhoArquivo);

// -------------------- APAGAR O CADASTRO NO BANCO --------------------

$sql = $con->prepare("DELETE FROM tb_tecnologo WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();

mysqli_close($con);

?>