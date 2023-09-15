<?php

$id = $_POST['id'];

include_once('../connection.php');

$sql = $con->prepare("UPDATE tb_tecnologo SET publicado = 1 WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
if ($sql == true && $con == true) {
    mysqli_close($con);
    header('Location: listaCasosSucesso.php');
    exit;
} else {
    echo "Erro ao tentar deletar o registro.";
}

?>