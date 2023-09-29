<?php
$id = $_POST['id'];

include_once('connection.php');

// -------------------- APAGAR A IMAGEM NO DIRETÓRIO --------------------
$sql = "SELECT foto FROM tb_tecnologo WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($foto);
    $stmt->fetch();

    $caminhoArquivo = "../profilePictures/" . $foto;

    if (file_exists($caminhoArquivo)) {
        unlink($caminhoArquivo);
    }
}

$stmt->close();

// -------------------- APAGAR O CADASTRO NO BANCO --------------------
$sql = "CALL deleteTecnologo(?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

$con->close();
?>