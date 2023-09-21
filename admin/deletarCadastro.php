<?php

$id = $_POST['id'];

include_once('connection.php');

// -------------------- APAGAR A IMAGEM NO DIRETÓRIO --------------------

$sql = "SELECT foto FROM tb_tecnologo WHERE id = $id";

$result = $con->query($sql);

if (!$result) {
    die("Query inválida! " . $con->error);
}

$row = $result->fetch_assoc();
$caminhoArquivo = "../profilePictures/" . $row['foto'];

unlink($caminhoArquivo);

// -------------------- APAGAR O CADASTRO NO BANCO --------------------

include_once('connection.php');

$sql = "CALL deleteTecnologo(?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$con->close();

?>