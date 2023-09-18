<?php

$id = $_POST['id'];

include_once('../connection.php');

// -------------------- APAGAR A IMAGEM NO DIRETÓRIO --------------------

$sql = "SELECT foto FROM tb_tecnologo WHERE id = $id";

$result = $con->query($sql);

if (!$result) {
    die("Query inválida! " . $con->error);
}

// -------------------- APAGAR O CADASTRO NO BANCO --------------------

$row = $result->fetch_assoc();
$caminhoArquivo = "../../profilePictures/" . $row['foto'];

unlink($caminhoArquivo);

$sql = $con->prepare("DELETE FROM tb_tecnologo WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();

?>